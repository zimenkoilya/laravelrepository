<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseAlert extends Model
{
    use HasFactory;
    protected $table = "case_alerts";
    protected $fillable = [
        'case_id',
        'user_id',
        'note',
        'priority',
        'complete',
        'completed_by',
        'created_date',
        'updated_date',
    ];
}
