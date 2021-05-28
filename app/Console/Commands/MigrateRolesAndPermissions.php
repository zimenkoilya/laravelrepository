<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class MigrateRolesAndPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:rolespermissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fuel_permissions = DB::table('rbac_permissions')->select('*')->get();

        foreach($fuel_permissions as $permission) {
            DB::table('permissions')->insert([
                'id' => $permission->id,
                'name' => $permission->name,
                'guard_name' => 'web',
                'path' => $permission->path,
            ]);
        }

        $fuel_roles = DB::table('rbac_roles')->select('*')->get();

        foreach($fuel_roles as $role) {
            DB::table('roles')->insert([
                'id' => $role->id,
                'name' => $role->title,
                'guard_name' => 'web',
                'description' => $role->description,
                'company_id' => $role->company_id,
                'sort' => $role->sort,
                'system' => $role->system,
                'assign' => $role->assign,
                'read_only' => $role->readOnly,
            ]);
        }


        $fuel_roles_permissions = DB::table('rbac_rolepermissions')->select('*')->get();

        foreach($fuel_roles_permissions as $role) {
            if ($role->role_id && $role->permission_id) {
                DB::table('role_has_permissions')->insert([
                    'role_id' => $role->role_id,
                    'permission_id' => $role->permission_id
                ]);
            }
        }

        $fuel_user_permissions = DB::table('rbac_user_permissions')->select('*')->get();

        foreach($fuel_user_permissions as $permission) {
            if ($permission->user_id && $permission->permission_id) {
                DB::table('model_has_permissions')->insert([
                    'model_id' => $permission->user_id,
                    'model_type' => 'App\Models\User',
                    'permission_id' => $permission->permission_id
                ]);
            }
        }

        $fuel_user_roles = DB::table('rbac_userroles')->select('*')->get();

        foreach($fuel_user_roles as $role) {
            if ($role->user_id && $role->role_id) {
                DB::table('model_has_roles')->insert([
                    'model_id' => $role->user_id,
                    'model_type' => 'App\Models\User',
                    'role_id' => $role->role_id
                ]);                
            }
        }
    }
}
