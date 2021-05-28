<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemEvent extends Model
{
    use HasFactory;
    protected $table = "system_events";
    protected $fillable = [
        'event_id',
        'action_id',
        'company_id',
        'created',
    ];
}
