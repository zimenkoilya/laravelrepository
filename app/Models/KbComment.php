<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KbComment extends Model
{
    use HasFactory;
    protected $table = "kb_comments";
    protected $fillable = [
        'post_id',
        'parent_id',
        'user_id',
        'comment',
        'created',
    ];
}
