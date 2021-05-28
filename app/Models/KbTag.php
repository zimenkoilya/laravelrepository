<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KbTag extends Model
{
    use HasFactory;
    protected $table = "kb_tags";
    protected $fillable = [
        'company_id',
        'name',
        'created',
        'created_by',
        'updated',
        'updated_by',
    ];
}
