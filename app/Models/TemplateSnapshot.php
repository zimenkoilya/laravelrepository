<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateSnapshot extends Model
{
    use HasFactory;
    protected $table = "template_snapshots";
    protected $fillable = [
        'company_id',
        'name',
        'body',
        'category',
        'window',
        'active',
        'updated',
        'updated_by',
        'created',
    ];
}
