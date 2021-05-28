<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketAttachment extends Model
{
    use HasFactory;
    protected $table = "support_ticket_attachments";
    protected $fillable = [
        'service_desk_item_id',
        'file_name',
        'file_location',
        'file_size',
        'file_extension',
        'created',
        'created_by',
    ];
}
