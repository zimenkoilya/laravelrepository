<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportCategory extends Model
{
    use HasFactory;
    protected $table = "support_categories";
    protected $fillable = [
        'category_name',
        'parent_id'
    ];
}
