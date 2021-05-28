<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActionReason extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'log_actions_reasons';
    protected $fillable = [
        'case_id',
        'log_action_id',
        'reason_id',
        'created',
        'created_by',
    ];
}
