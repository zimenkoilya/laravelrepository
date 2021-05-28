<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLabel extends Model
{
    use HasFactory;
    protected $table = "status_labels";
    protected $fillable = [
        'case_id',
        'broker_case_id',
        'created',
        'created_by',
        'confirmed',
        'email',
        'phone',
        'type',
    ];
}
