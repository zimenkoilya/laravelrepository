<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseAdditional extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'case_additional';
    protected $fillable = [
        'case_id',
        'field_id',
        'field_value',
        'f_int',
        'f_decimal',
        'f_shortstring',
        'f_string',
        'f_date',
        'f_datetime',
        'f_boolean',
        'f_blob',
        'modified',
    ];
}
