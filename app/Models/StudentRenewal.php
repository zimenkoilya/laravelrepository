<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRenewal extends Model
{
    use HasFactory;
    protected $table = "student_renewals";
    protected $fillable = [
        'case_id',
        'submission_date',
        'repayment_start_date',
        'repayment_process_date',
        'final_payment_amount',
        'final_program_type',
    ];
}
