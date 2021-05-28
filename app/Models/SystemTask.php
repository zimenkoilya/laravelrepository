<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemTask extends Model
{
    use HasFactory;
    protected $table = "system_tasks";
    protected $fillable = [
        'name',
        'interval',
        'last_execution',
    ];
}
