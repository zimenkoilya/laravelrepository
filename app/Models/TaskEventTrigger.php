<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskEventTrigger extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'task_events_triggers';
    protected $fillable = [
        'company_id',
        'event_id',
        'event_type_id',
        'event_action',
        'task_template_id',
    ];
}
