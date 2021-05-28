<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'name',
        'params',
        'enabled',
        'module',
        'description',
        'label',
        'oauth_id',
    ];
}
