<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasePage extends Model
{
    use HasFactory;
    protected $table = "case_pages";
    protected $fillable = [
        'url',
        'title',
        'scope',
        'module_id',
    ];
}
