<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubmissionLoan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_submissions_loans';
    protected $fillable = [
        'loan_id',
        'submission_id',
        'created',
        'created_by',
    ];
}
