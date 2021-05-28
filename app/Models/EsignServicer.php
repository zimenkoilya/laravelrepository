<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsignServicer extends Model
{
    use HasFactory;
    protected $table = "esign_servicers";
    protected $fillable = [
        'name',
        'function',
    ];
}
