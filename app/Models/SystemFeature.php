<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemFeature extends Model
{
    use HasFactory;
    protected $table = "system_feature";
    protected $fillable = [
        'name'
    ];
}
