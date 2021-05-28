<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sms';
    protected $fillable = [
        'case_id',
        'sid',
        'to_number',
        'from_number',
        'message',
        'delivered',
        'direction',
        'message_user_id',
        'viewed_by',
        'viewed_date',
        'replied_by',
        'replied_date',
        'created_date',
        'created_by',
        'archived',
        'template_id',
        'doc_id',
        'segments',
        'ct_id',
        'cost_',
        'updated',
    ];
}
