<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentServiceTitle extends Model
{
    use HasFactory;
    protected $table = "student_service_titles";
    protected $fillable = [
        'name'
    ];
}
