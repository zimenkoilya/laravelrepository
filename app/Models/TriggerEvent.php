<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TriggerEvent extends Model
{
    use HasFactory;
    protected $table = "trigger_events";
    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
    ];
}
