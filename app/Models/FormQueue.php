<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormQueue extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'form_queue';
    protected $fillable = [
        'case_id',
        'form_id',
        'data',
        'created',
        'approved',
        'approved_date',
        'approved_by',
    ];
}
