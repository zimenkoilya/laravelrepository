<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsignCategory extends Model
{
    use HasFactory;
    protected $table = "esign_categories";
    protected $fillable = [
        'name'
    ];
}
