<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLoanDetail extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_loan_detail';
    protected $fillable = [
        'loan_id',
        'disbursement_date',
        'disbursement_amount',
        'loan_status',
        'status_description',
        'status_effective_date',
    ];
}
