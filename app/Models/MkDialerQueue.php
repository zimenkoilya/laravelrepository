<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkDialerQueue extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mk_dialer_queue';
    protected $fillable = [
        'case_id',
        'uuid',
        'schedule_id',
        'data_id',
        'status_id',
        'dialer_template_id',
        'sent',
        'wallet_trans_id',
        'created',
        'updated',
        'error_code',
    ];
}
