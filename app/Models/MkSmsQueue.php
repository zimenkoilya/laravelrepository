<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkSmsQueue extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mk_sms_queue';
    protected $fillable = [
        'schedule_id',
        'data_id',
        'status_id',
        'message_id',
        'number_id',
        'sent',
        'segments',
        'wallet_trans_id',
        'created',
        'updated',
        'error_code',
    ];
}
