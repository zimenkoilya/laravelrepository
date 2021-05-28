<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortalDefinition extends Model
{
    use HasFactory;
    protected $table = "portal_definitions";
    protected $fillable = [
        'tag',
        'name',
        'body',
    ];
}
