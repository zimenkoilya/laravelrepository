<?php

namespace App\Transformers;

use App\Models\Event;
use League\Fractal\TransformerAbstract;

class EventTransformer extends TransformerAbstract
{
    public function transform(Event $Event)
    {
        return [
            'id' => $Event->id,
            'company_id' => $Event->company_id,
            'calendar_id' => $Event->calendar_id,
            'case_id' => $Event->case_id,
            'user_id' => $Event->user_id,
            'title' => $Event->title,
            'description' => $Event->description,
            'duration' => $Event->duration,
            'alert_at' => $Event->alert_at,
            'alert_email' => $Event->alert_email,
            'email_sent' => $Event->email_sent,
            'alert_popup' => $Event->alert_popup,
            'popup_triggered' => $Event->popup_triggered,
            'created_by' => $Event->created_by,
            'completed' => $Event->completed,
            'alert_offset' => $Event->alert_offset,
            'icon' => $Event->icon,
            'color' => $Event->color,
            'snoozed' => $Event->snoozed,
            'type_id' => $Event->type_id,
            'datetime' => $Event->at,
            'endtime' => $Event->end_time,
            'event_type_name'=>$Event->eventType->name,
        ];
    }
}
