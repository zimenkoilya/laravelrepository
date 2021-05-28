<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailFilter extends Model
{
    use HasFactory;
    protected $table = "email_filters";
    protected $fillable = [
        'name',
        'conditions',
        'forward_client',
        'mark_read',
        'label_id',
        'run_action_id',
        'active',
    ];
}
