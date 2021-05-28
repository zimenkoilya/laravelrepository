<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateTask extends Model
{
    use HasFactory;
    protected $table = "template_tasks";
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
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
