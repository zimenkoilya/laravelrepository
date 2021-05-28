<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBrokerObject extends Model
{
    use HasFactory;
    protected $table = "student_broker_object";
    protected $fillable = [
        'name',
        'type',
        'key',
        'color',
        'icon',
    ];
}
