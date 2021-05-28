<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogMisc extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'log_misc';
    protected $fillable = [
        'case_id',
        'type',
        'message',
        'pkid',
        'user',
        'created',
        'error',
    ];
}
