<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusType extends Model
{
    use HasFactory;
    protected $table = "status_types";
    protected $fillable = [
        'name',
        'status_field',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
}
