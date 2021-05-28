<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnboardingCompany extends Model
{
    use HasFactory;
    protected $table = "onboarding_companies";
    protected $fillable = [
        'company_name',
        'address',
        'month_deal_avg',
        'financing',
        'processing_price',
    ];
}
