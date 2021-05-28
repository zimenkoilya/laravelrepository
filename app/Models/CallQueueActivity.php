<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallQueueActivity extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'call_queue_activity';
    protected $fillable = [
        'user_id',
        'extension',
        'queue',
        'case_id',
        'disposition',
        'created',
    ];
}
