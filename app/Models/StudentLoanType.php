<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLoanType extends Model
{
    use HasFactory;
    protected $table = "student_loan_types";
    protected $fillable = [
        'name',
        'letter',
    ];
}
