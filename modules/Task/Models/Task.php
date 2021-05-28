<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'task_template_id',
        'title',
        'description',
        'case_id',
        'due_date',
        'assigned_user_id',
        'assigned_at',
        'created_at',
        'created_by',
        'completed_at',
        'completed_by',
        'status'
    ];
}
