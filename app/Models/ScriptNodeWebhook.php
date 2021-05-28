<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptNodeWebhook extends Model
{
    use HasFactory;
    protected $table = "script_node_webhooks";
    protected $fillable = [
        'webhook_type'
    ];
}
