<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailOpen extends Model
{
    use HasFactory;
    protected $table = "email_opens";
    protected $fillable = [
        'email_id',
        'opentime',
        'openip',
    ];
}
