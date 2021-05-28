<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snapshot extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'body',
        'name',
        'updated',
        'updated_by',
        'window_size',
        'template_id',
        'active',
    ];
}
