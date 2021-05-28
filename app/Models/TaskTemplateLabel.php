<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTemplateLabel extends Model
{
    use HasFactory;
    protected $table = "task_template_labels";
    protected $fillable = [
        'label_id',
        'name',
        'template_id',
    ];
}
