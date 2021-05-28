<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateCall extends Model
{
    use HasFactory;
    protected $table = "template_calls";
    protected $fillable = [
        'company_id',
        'name',
        'from',
        'to',
        'message',
    ];
}
