<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;
    protected $table = "work_orders";
    protected $fillable = [
        'uuid',
        'case_id',
        'title',
        'total',
        'status_id',
        'label_id',
        'sale_date',
        'service_type',
        'appt_date',
        'associate_id',
        'provider_number',
        'notes',
        'assinged_user_id',
        'agreement_number',
        'created',
        'created_by',
    ];
    
}
