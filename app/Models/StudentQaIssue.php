<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQaIssue extends Model
{
    use HasFactory;
    protected $table = "student_qa_issues";
    protected $fillable = [
        'context',
        'trigger_value',
        'issue',
        'name',
    ];
}
