<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KbCategory extends Model
{
    use HasFactory;
    protected $table = "kb_category";
    protected $fillable = [
        'type_id',
        'company_id',
        'name',
        'description',
        'order',
        'active',
        'updated',
        'updated_by',
        'created',
        'created_by',
    ];
}
