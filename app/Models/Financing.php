<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financing extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'financing';
    protected $fillable = [
        'case_id',
        'application_id',
        'score',
        'track',
        'status',
        'sub_status',
        'approval',
        'created',
        'created_by',
        'pin',
        'key',
        'code',
        'isApp',
        'co_application_id',
        'co_score',
        'co_track',
        'co_approval',
        'co_fields',
        'bucket',
        'updated',
        'updated_by',
        'sheet',
        'initial_payment_date',
        'contract_id',
        'express_sent',
        'express',
        'sign_date',
        'current',
        'last_check',
        'est_amt_financed',
    ];
}
