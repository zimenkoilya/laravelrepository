<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateSignature extends Model
{
    use HasFactory;
    protected $table = "template_signatures";
    protected $fillable = [
        'company_id',
        'name',
        'message',
        'default',
    ];
}
