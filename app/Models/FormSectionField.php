<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSectionField extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'form_sections_fields';
    protected $fillable = [
        'company_id',
        'section_id',
        'container_id',
        'field_id',
        'sort',
        'read_only',
        'required',
        'created',
        'updated',
    ];
}
