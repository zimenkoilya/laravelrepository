<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KbTopic extends Model
{
    use HasFactory;
    protected $table = "kb_topics";
    protected $fillable = [
        'company_id',
        'category_id',
        'name',
        'description',
        'created',
        'created_by',
        'icon',
        'posts',
        'last_post',
        'last_post_by',
        'updated',
        'updated_by',
    ];
}
