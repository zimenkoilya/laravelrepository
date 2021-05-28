<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'time',
        'title',
        'description',
        'assigned_user_id',
        'assigned_at',
        'task_template_id',
        'due_date',
        'case_id',
        'status',
        'created_at',
        'created_by',
        'completed_at',
        'completed_by',
        'updated_at',
        'updated_by',
    ];
}
