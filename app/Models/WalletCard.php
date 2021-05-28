<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletCard extends Model
{
    use HasFactory;
    protected $table = "wallet_cards";
    protected $fillable = [
        'company_id',
        'card_type',
        'title',
        'credit_card_number',
        'name_on_card',
        'exp_month',
        'exp_year',
        'cvv',
        'billing_street',
        'billing_street2',
        'billing_city',
        'billing_state',
        'billing_zip',
        'active',
        'created',
        'created_by',
        'updated',
        'updated_by',
    ];
}
