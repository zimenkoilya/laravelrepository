<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSection extends Model
{
    use HasFactory;
    protected $table = "form_sections";
    protected $fillable = [
        'company_id',
        'object_id',
        'vertical_id',
        'type',
        'name',
        'template',
        'parent_id',
        'sort',
        'instruction',
        'enabled',
        'created',
        'updated',
    ];
}
