<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortalUser extends Model
{
    use HasFactory;
    protected $table = "portal_users";
    protected $fillable = [
        'case_id',
        'first_name',
        'last_name',
        'email',
        'passwd',
        'active',
        'token',
        'tour',
        'last_login',
        'confirmed',
        'confirmed_ip',
    ];
}
