<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Models\Permission as SpatiePermission;
use Spatie\Permission\Contracts\Permission as PermissionContract;

// class Permission extends SpatiePermission implements PermissionContract
class Permission extends SpatiePermission
{
    protected $fillable = [
        'name',
        'guard_name',
        'path',
    ];
}
