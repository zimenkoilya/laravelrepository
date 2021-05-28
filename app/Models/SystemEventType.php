<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemEventType extends Model
{
    use HasFactory;
    protected $table = "system_event_types";
    protected $fillable = [
        'event',
        'description',
    ];
}
