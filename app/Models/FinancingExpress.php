<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingExpress extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'financing_express';
    protected $fillable = [
        'case_id',
        'application_id',
        'track',
        'contract_id',
        'vault_id',
        'attested',
        'received_payment',
        'charge_back',
        'created',
        'updated',
    ];
}
