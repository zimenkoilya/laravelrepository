<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditreportInquiry extends Model
{
    use HasFactory;
    protected $table = "creditreport_inquiries";
    protected $fillable = [
        'active',
        'included',
        'case_id',
        'date',
        'subscriber_name',
        'subscriber_number',
        'amount',
        'mkt',
        'sub_mkt',
        'kob',
        'phone',
    ];
}
