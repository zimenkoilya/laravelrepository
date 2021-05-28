<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;
    protected $table = "chat_messages";
    protected $fillable = [
        'thread_id',
        'message',
        'user_id',
        'created_date',
        'doc_id',
    ];
}
