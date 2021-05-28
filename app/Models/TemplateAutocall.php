<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateAutocall extends Model
{
    use HasFactory;
    protected $table = "template_autocalls";
    protected $fillable = [
        'company_id',
        'name',
        'caller_id',
        'extension',
        'to_phone',
        'created',
        'autoanswer',
        'is_script',
        'script_name',
    ];
}
