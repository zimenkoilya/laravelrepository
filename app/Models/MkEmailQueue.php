<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkEmailQueue extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mk_email_queue';
    protected $fillable = [
        'uuid',
        'schedule_id',
        'data_id',
        'status_id',
        'rvm_template_id',
        'sent',
        'wallet_trans_id',
        'created',
        'updated',
        'error_code',
    ];
}
