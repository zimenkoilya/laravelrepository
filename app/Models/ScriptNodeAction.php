<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptNodeAction extends Model
{
    use HasFactory;
    protected $table = "script_nodes_actions";
    protected $fillable = [
        'node_id',
        'button_text',
        'action_node_id',
        'score',
    ];
}
