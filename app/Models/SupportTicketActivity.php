<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketActivity extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'support_ticket_activity';
    protected $fillable = [
        'service_desk_item_id',
        'activity_type_id',
        'activity_message',
        'activity_user',
    ];
}
