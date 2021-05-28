<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateEvent extends Model
{
    use HasFactory;
    protected $table = "template_events";
    protected $fillable = [
        'company_id',
        'name',
        'title',
        'when',
        'assign_to',
        'created',
    ];
}
