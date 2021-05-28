<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'calendar_id',
        'case_id',
        'user_id',
        'title',
        'description',
        'at',
        'end_time',
        'duration',
        'alert_at',
        'icon',
        'color',
        'snoozed',
        'type_id',
    ];

    public function eventType(){
        $result = $this->belongsTo(EventType::class,'type_id');
        return $result;
    }

    public function cases(){
        return $this->hasOne(Cases::class, 'id', 'case_id');
    }
}
