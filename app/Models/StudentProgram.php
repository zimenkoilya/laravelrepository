<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProgram extends Model
{
    use HasFactory;
    protected $table = "student_program";
    protected $fillable = [
        'case_id',
        'type',
        'student_plan_id',
        'months',
        'number_loans',
        'payment',
        'rate',
        'loan_status',
        'total_amount',
        'servicer_accnt',
        'fsa_setup',
        'active',
        'created',
        'created_by',
        'updated',
        'updated_by',
        'standard_payment',
        'previous_payment',
        'new_payment',
        'service_type',
        'total_included_amount',
        'total_loans',
        'multiple_servicers',
    ];
}
