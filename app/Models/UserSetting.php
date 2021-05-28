<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;
    protected $table = "user_settings";
    protected $fillable = [
        'user_id',
        'type',
        'value',
        'description',
        'created',
        'created_by',
        'updated',
        'updated_by',
    ];
}
