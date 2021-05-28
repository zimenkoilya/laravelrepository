<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBatch extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'log_batch';
    protected $fillable = [
        'batch_id',
        'count',
        'user_id',
        'created',
        'completed_date',
        'actions',
    ];
}
