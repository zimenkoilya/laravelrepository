<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateFlag extends Model
{
    use HasFactory;
    protected $table = "template_flags";
    protected $fillable = [
        'name',
        'table',
        'case_field',
        'field_value',
        'icon_value',
        'in_activity',
    ];
}
