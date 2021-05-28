<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseProduct extends Model
{
    use HasFactory;
    protected $table = "case_products";
    protected $fillable = [
        'type_id',
        'created',
        'created_by',
    ];
}
