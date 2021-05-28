<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workboard extends Model
{
    use HasFactory;
    protected $table = "workboards";
    protected $fillable = [
        'name',
        'role',
        'sort',
        'created',
        'created_by',
    ];
}
