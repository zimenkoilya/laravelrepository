<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KbPost extends Model
{
    use HasFactory;
    protected $table = "kb_posts";
    protected $fillable = [
        'company_id',
        'topic_id',
        'body',
        'video',
        'created',
        'created_by',
        'modified',
        'updated',
        'updated_by',
    ];
}
