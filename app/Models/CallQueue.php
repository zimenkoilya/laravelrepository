<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallQueue extends Model
{
    use HasFactory;
    protected $table = "call_queues";
    protected $fillable = [
        'company_id',
        'queue_num',
        'description',
    ];
}
