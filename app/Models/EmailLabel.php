<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailLabel extends Model
{
    use HasFactory;
    protected $table = "email_labels";
    protected $fillable = [
        'user_id',
        'label',
        'system',
        'active',
    ];
}
