<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialerList extends Model
{
    use HasFactory;
    protected $table = "dialer_lists";
    protected $fillable = [
        'name',
        'created',
        'created_by',
    ];
}
