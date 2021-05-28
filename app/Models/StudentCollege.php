<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCollege extends Model
{
    use HasFactory;
    protected $table = "student_colleges";
    protected $fillable = [
        'dapipID',
        'opeID',
        'name',
        'parent_name',
        'location_type',
        'address',
        'phone',
    ];
}
