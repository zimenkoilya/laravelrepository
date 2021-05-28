<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Model;

class TaskTemplate extends Model
{
    public $timestamps = false;

    protected $table = 'template_tasks';

    protected $fillable = [
        'company_id',
        'role_id',
        'name',
        'type',
        'order',
        'active',
        'instruction',
        'for_client',
        'workflow',
        'target',
        'target_id',
        'created',
        'created_by',
        'updated',
        'updated_by'
    ];
}
