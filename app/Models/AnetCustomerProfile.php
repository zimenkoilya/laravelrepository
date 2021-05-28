<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnetCustomerProfile extends Model
{
    use HasFactory;
    protected $table = "anet_cusotmer_profiles";
    protected $fillable = [
        'case_id',
        'profile_id',
        'gateway_id',
        'modified_at',
        'confirmed_at'
    ];
}
