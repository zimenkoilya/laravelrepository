<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAction extends Model
{
    use HasFactory;
    protected $table = "log_actions";
    protected $fillable = [
        'company_id',
        'case_id',
        'action_id',
        'first',
        'created_by',
        'created',
        'user_id',
    ];
}
