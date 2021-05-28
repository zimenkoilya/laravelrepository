<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptNodeLog extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'script_node_log';
    protected $fillable = [
        'session_id',
        'user_id',
        'from_node_id',
        'node_id',
        'created',
    ];
}
