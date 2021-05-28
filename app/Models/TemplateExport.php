<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateExport extends Model
{
    use HasFactory;
    protected $table = "template_exports";
    protected $fillable = [
        'company_id',
        'name',
        'type',
        'url',
        'data_template',
        'active',
        'deleted',
        'created_by',
        'updated_by',
    ];
}
