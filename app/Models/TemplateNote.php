<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateNote extends Model
{
    use HasFactory;
    protected $table = "template_notes";
    protected $fillable = [
        'company_id',
        'name',
        'message',
        'description',
    ];
}
