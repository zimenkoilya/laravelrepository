<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkVertical extends Model
{
    use HasFactory;
    protected $table = "mk_verticals";
    protected $fillable = [
        'name'
    ];
}
