<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLoan extends Model
{
    use HasFactory;
    protected $table = "student_loans";
    protected $fillable = [
        'case_id',
        'type',
        'loan_type_id',
        'attending_school',
        'loan_date',
        'repayment_date',
        'amount',
        'disbursed_amount',
        'cancelled_amount',
        'principal_balance',
        'interest_balance',
        'rate_type',
        'rate',
        'status',
        'description',
        'included',
        'active',
        'created',
        'excluded',
        'repayment_type',
        'cumulative-amount',
        'plan_scheduled_amount',
        'anniversary_date',
        'loan_contact',
        'enrollment_status',
        'loan_award_id',
        'loan_contact_street_1',
        'loan_contact_street_2',
        'loan_contact_city',
        'loan_contact_state',
        'loan_contact_zip',
    ];
}
