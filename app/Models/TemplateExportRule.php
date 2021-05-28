<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateExportRule extends Model
{
    use HasFactory;
    protected $table = "template_exports_rules";
    protected $fillable = [
        'field_id',
        'operator',
        'value',
    ];
}
