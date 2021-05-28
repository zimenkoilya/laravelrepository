<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseTransfer extends Model
{
    use HasFactory;
    protected $table = "case_transfers";
    protected $fillable = [
        'entity_type',
        'transfer_type',
        'company_source',
        'company_target',
        'user_target',
        'created_by',
        'created',
    ];
}
