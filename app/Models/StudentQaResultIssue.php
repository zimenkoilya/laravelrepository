<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQaResultIssue extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_qa_results_issues';
    protected $fillable = [
        'result_id',
        'case_id',
        'issue_id',
        'created',
        'created_by',
        'notes',
        'completed',
        'completed_by',
    ];
}
