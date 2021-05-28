<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'case_id',
        'created',
        'num_invoice',
        'title',
        'total',
        'status',
        'label_id',
    ];
}
