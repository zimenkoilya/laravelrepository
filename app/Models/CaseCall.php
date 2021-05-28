<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseCall extends Model
{
    use HasFactory;
    protected $table = "case_calls";
    protected $fillable = [
        'case_id',
        'user_id',
        'duration',
        'note',
        'type_id',
        'result_id',
        'timestamp',
        'direction',
        'filename',
        'extentsion',
        'queue_id',
        'did',
        'created',
    ];
}
