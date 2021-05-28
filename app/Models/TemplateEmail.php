<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateEmail extends Model
{
    use HasFactory;
    protected $table = "template_emails";
    protected $fillable = [
        'company_id',
        'name',
        'from',
        'to',
        'cc',
        'bcc',
        'subject',
        'fixed',
        'fields_required',
        'active',
        'shared',
    ];
}
