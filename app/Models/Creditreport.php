<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creditreport extends Model
{
    use HasFactory;
    protected $table = "creditreports";
    protected $fillable = [
        'status_id',
        'application_id',
        'case_id',
        'data',
        'sumitted',
        'created_by',
        'created',
    ];
}
