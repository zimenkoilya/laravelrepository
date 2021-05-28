<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateCommunication extends Model
{
    use HasFactory;
    protected $table = "template_communications";
    protected $fillable = [
        'company_id',
        'name',
        'template_call_id',
        'template_email_id',
        'template-sms_id',
    ];
}
