<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStatus extends Model
{
    use HasFactory;
    protected $table = "case_statuses";
    protected $fillable = [
        'case_id',
        'is_company',
        'status_id',
        'campaign_id',
        'docs_status',
        'doc_signed',
        'is_client',
        'is_deleted',
        'accounting_status_id',
        'dialer_id',
        'doc_submission',
        'renewal_date',
        'paused',
        'updated',
        'created',
        'status_updated',
        'dialer_updated',
        'accounting_updated',
        'financed',
        'activation_date',
        'termination_date',
        'accounting_type',
        'submission_ready',
        'account_type_id',
        'poi_id',
        'processor_id',
        'shark_tank',
        'direct_mail_id',
    ];
}
