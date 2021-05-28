<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportStatus extends Model
{
    use HasFactory;
    protected $table = "support_statuses";
    protected $fillable = [
        'status_name'
    ];
}
