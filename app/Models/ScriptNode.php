<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptNode extends Model
{
    use HasFactory;
    protected $table = "script_nodes";
    protected $fillable = [
        'node_num',
        'script_id',
        'type_id',
        'title',
        'content_area',
        'question',
        'updated',
        'updated_by',
    ];
}
