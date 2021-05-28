<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $fillable = [
        'in_queue',
        'case_id',
        'msg_id',
        'subject',
        'body',
        'email_to',
        'email_from',
        'from_client',
        'reply_id',
        'cc_to',
        'bcc_to',
        'reply_to',
        'headers',
        'template_id',
        'direction',
        'message_user_id',
        'viewed_by',
        'viewed_date',
        'replied_by',
        'replied_date',
        'created_by',
        'created_date',
        'archieved',
        'sent_date',
        'trash',
        'msg_rule_id',
        'custom',
    ];
}
