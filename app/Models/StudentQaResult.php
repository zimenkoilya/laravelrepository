<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQaResult extends Model
{
    use HasFactory;
    protected $table = "student_qa_results";
    protected $fillable = [
        'case_id',
        'created_by',
        'created',
        'notes',
        'completed',
        'completed_by',
        'passed',
    ];
}
