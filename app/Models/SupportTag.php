<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTag extends Model
{
    use HasFactory;
    protected $table = "support_tags";
    protected $fillable = [
        'name',
        'color_hex',
    ];
}
