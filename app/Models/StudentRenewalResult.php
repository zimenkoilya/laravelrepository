<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRenewalResult extends Model
{
    use HasFactory;
    protected $table = "student_renewal_results";
    protected $fillable = [
        'case_id',
        'created_by',
        'created',
        'data',
        'passed',
        'basic_completed',
        'income_completed',
        'uploaded_docs',
        'review_completed',
        'esign_sent',
        'esign_document_id',
        'esign_confirmed',
        'completed',
    ];
}
