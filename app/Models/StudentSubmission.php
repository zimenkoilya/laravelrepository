<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubmission extends Model
{
    use HasFactory;
    protected $table = "student_submissions";
    protected $fillable = [
        'count',
        'case_id',
        'type',
        'income_type',
        'submission_date',
        'consolidation_date',
        'repayment_start_date',
        'renewal_date',
        'renewal_reminder_date',
        'student_program_id',
        'student_quote_id',
        'servicer_id',
        'fax_id',
        'plan',
        'term_months',
        'rate',
        'payment',
        'loan_count',
        'loan_total',
        'edit_mode',
        'active',
        'created',
        'created_by',
    ];
}
