<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldOption extends Model
{
    use HasFactory;
    protected $table = "form_field_options";
    protected $fillable = [
        'company_id',
        'object_field_id',
        'value',
        'sort',
    ];
}
