<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;
    protected $table = "form_fields";
    protected $fillable = [
        'company_id',
        'object_id',
        'section_id',
        'container_id',
        'name',
        'clean_name',
        'field_type_id',
        'fee',
        'readonly',
        'validation_id',
        'required',
        'editable',
        'system',
        'sort',
        'sortable',
        'sort_name',
    ];
}
