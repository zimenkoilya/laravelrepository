<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Contracts\Role as RoleContract;
use Spatie\Permission\Models\Role as SpatieRole;

use App\Scopes\CompanyAndSystemOwnScope;

// class Role extends SpatieRole implements RoleContract
class Role extends SpatieRole
{
    protected $table = "roles";
    protected $fillable = [
        'name',
        'guard_name',
        'description',
        'company_id',
        'sort',
        'system',
        'read_only',
        'keep',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new CompanyAndSystemOwnScope());
    }    

    /**
     * Get default role or not
     */
    public function getIsDefaultAttribute()
    {
        return $this->company_id == 1;
    }
}
