<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingWorkflow extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'financing_workflow';
    protected $fillable = [
        'case_id',
        'recording_sent',
        'poi_sent',
        'express_sent',
        'consolidation_sent',
        'warranty_sent',
        'funds_released',
        'updated',
        'client_portal',
    ];
}
