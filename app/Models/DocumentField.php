<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentField extends Model
{
    use HasFactory;
    protected $table = "document_fields";
    protected $fillable = [
        'form_id',
        'form_field',
        'value',
        'required',
        'form_field_type',
    ];
}
