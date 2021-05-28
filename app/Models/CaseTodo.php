<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseTodo extends Model
{
    use HasFactory;
    protected $table = "case_todos";
    protected $fillable = [
        'case_id',
        'type_id',
        'user_id',
        'title',
        'note',
        'priority',
        'complete',
        'completed_by',
        'created',
        'completed_date
        ',
        'created_by',
    ];
}
