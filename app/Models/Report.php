<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'name',
        'additional_properties',
        'category',
        'type',
        'columns',
        'user_id',
        'created_by',
        'created',
    ];
}
