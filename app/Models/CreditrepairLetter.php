<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditrepairLetter extends Model
{
    use HasFactory;
    protected $table = "creditrepair_letters";
    protected $fillable = [
        'dispute_id',
        'letter_optioin_id',
        'status_id',
        'sent_date',
        'due_date',
        'created',
        'created_by',
        'updated',
        'updated_by',
    ];
}
