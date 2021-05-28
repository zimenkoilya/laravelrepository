<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'name',
        'context',
        'conditions',
        'content',
        'created_by',
        'updated_by',
    ];
}
