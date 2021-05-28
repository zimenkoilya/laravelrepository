<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;
    protected $table = "event_types";
    protected $fillable = [
        'company_id',
        'name',
        'active',
        'created',
        'created_by',
        'updated',
        'updated_by',
    ];
}
