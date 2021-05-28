<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLender extends Model
{
    use HasFactory;
    protected $table = "student_lenders";
    protected $fillable = [
        'name',
        'street',
        'city',
        'state',
        'zip',
        'phone',
    ];
}
