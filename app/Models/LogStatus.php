<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogStatus extends Model
{
    use HasFactory;
    protected $table = "log_statuses";
    protected $fillable = [
        'case_id',
        'status_id',
        'created',
        'created_by',
    ];
}
