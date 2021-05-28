<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentService extends Model
{
    use HasFactory;
    protected $table = "student_services";
    protected $fillable = [
        'case_id',
        'title_id'
    ];
}
