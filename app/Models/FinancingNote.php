<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingNote extends Model
{
    use HasFactory;
    protected $table = "financing_notes";
    protected $fillable = [
        'case_id',
        'application_id',
        'note_id',
        'note',
        'created',
        'owner',
    ];
}
