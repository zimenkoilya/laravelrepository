<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditrepairDispute extends Model
{
    use HasFactory;
    protected $table = "creditrepair_disputes";
    protected $fillable = [
        'case_id',
        'item_id',
        'type',
        'instruction_id',
        'credit_bureau',
        'status',
        'letter_id',
        'due_on',
        'furnisher',
        'positive',
        'instructions',
        'notes',
        'field_data',
        'created',
        'created_by',
        'updated',
        'updated_by',
    ];
}
