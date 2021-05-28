<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseTransaction extends Model
{
    use HasFactory;
    protected $table = "case_transactions";
    protected $fillable = [
        'case_id',
        'from_company_id',
        'to_company_id',
        'type',
        'status',
        'status_updated_by',
        'status_date',
        'amount',
        'cost',
        'created_by',
        'created',
        'note',
    ];
}
