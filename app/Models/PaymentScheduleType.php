<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentScheduleType extends Model
{
    use HasFactory;
    protected $table = "payment_schedule_types";
    protected $fillable = [
        'company_id',
        'scheduled_type_id',
    ];
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}
