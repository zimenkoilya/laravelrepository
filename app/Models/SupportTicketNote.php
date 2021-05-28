<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketNote extends Model
{
    use HasFactory;
    protected $table = "support_ticket_notes";
    protected $fillable = [
        'service_desk_item_id',
        'note',
        'created',
        'created_by',
    ];
}
