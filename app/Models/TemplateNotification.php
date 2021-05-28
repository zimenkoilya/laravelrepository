<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateNotification extends Model
{
    use HasFactory;
    protected $table = "template_notifications";
    protected $fillable = [
        'company_id',
        'name',
        'to',
        'message',
        'size',
        'color',
        'icon',
        'type_id',
        'department_id',
    ];
}
