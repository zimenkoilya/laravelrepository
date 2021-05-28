<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'case_id',
        'title',
        'message',
        'note_id',
        'type',
        'icon',
        'exp_date',
        'size',
        'color',
        'direction',
        'message_user_id',
        'displayed',
        'viewed_by',
        'viewed_date',
        'replied_by',
        'replied_date',
        'created_by',
        'created_date',
        'archived',
        'template_id',
    ];
}
