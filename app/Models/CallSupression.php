<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallSupression extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'call_supression';
    protected $fillable = [
        'company_id',
        'type',
        'did',
        'created',
        'created_by',
        'tracking_info',
        'source',
        'destination',
        'description',
        'block_sms',
        'block_rvm',
        'block_inbound_voice',
        'block_outbound_voice',
    ];
}
