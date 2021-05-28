<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fax extends Model
{
    use HasFactory;
    protected $fillable = [
        'ct_id',
        'case_id',
        'from_number',
        'to_number',
        'document_id',
        'status',
        'type_id',
        'created',
        'created_by',
        'fax_id',
        'direction',
        'num_pages',
        'document_url',
        'duration',
        'price',
    ];
}
