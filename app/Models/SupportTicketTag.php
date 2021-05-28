<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketTag extends Model
{
    use HasFactory;
    protected $table = "support_ticket_tags";
    protected $fillable = [
        'service_desk_item_id',
        'service_desk_tag_id',
        'added_by',
        'added',
    ];
}
