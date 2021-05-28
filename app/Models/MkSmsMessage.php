<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkSmsMessage extends Model
{
    use HasFactory;
    protected $table = "mk_sms_messages";
    protected $fillable = [
        'data_id',
        'created',
        'message',
        'setting_id',
        'number_id',
        'from_phone',
        'message_id',
        'segments',
        'wallet_trans_id',
        'company_id',
    ];
}
