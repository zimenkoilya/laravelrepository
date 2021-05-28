<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldType extends Model
{
    use HasFactory;
    protected $table = "form_field_types";
    protected $fillable = [
        'name',
        'structure',
        'f_field',
    ];
}
