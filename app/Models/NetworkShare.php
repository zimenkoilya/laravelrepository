<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetworkShare extends Model
{
    use HasFactory;
    protected $table = "network_shares";
    protected $fillable = [
        'company_id',
        'network_id',
        'type',
        'ids',
    ];
}
