<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateImport extends Model
{
    use HasFactory;
    protected $table = "template_imports";
    protected $fillable = [
        'company_id',
        'name',
        'updated_template',
        'data_template',
        'action_id',
        'hash',
        'active',
        'deleted',
        'data_model',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
}
