<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallNote extends Model
{
    use HasFactory;
    protected $table = "call_notes";
    protected $fillable = [
        'call_id',
        'note',
        'created_by',
        'created_date',
    ];  
}
