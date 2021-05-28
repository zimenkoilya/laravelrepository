<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketChat extends Model
{
    use HasFactory;
    protected $table = "support_ticket_chats";
    protected $fillable = [
        'service_desk_item_id',
        'chat_message',
        'created_by',
        'created',
    ];
}
