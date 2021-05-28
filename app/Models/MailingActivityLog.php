<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailingActivityLog extends Model
{
    use HasFactory;
    protected $table = "mailing_activity_logs";
    protected $fillable = [
        'case_id',
        'direction',
        'template_id',
        'from_email',
        'to_email',
        'created',
        'from_name',
        'from_id',
        'to_name',
        'raw_additional_properties',
    ];
}
