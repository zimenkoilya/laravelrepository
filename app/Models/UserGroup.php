<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;
    protected $table = "user_groups";
    protected $fillable = [
        'name',
        'company_id',
        'user_count',
        'created_date',
        'sort',
    ];
}
