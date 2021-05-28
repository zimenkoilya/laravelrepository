<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseNote extends Model
{
    use HasFactory;
    protected $table = "case_notes";
    protected $fillable = [
        'case_id',
        'type_id',
        'user_id',
        'note',
        'created',
        'draft',
    ];
}
