<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustEft extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trust_eft';
    protected $fillable = [
        'trust_id',
        'case_id',
        'transaction_id',
        'eft_date',
        'eft_amount',
        'memo',
        'last_message',
        'status_code',
        'status_date',
        'settled_date',
        'returned_date',
        'nsf_return_code',
    ];
}
