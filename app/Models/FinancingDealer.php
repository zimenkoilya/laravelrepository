<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingDealer extends Model
{
    use HasFactory;
    protected $table = "financing_dealers";
    protected $fillable = [
        'company_id',
        'dealer_code',
        'dealer_key',
        'dealer_pin',
    ];
}
