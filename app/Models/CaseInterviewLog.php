<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseInterviewLog extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'case_interview_log';
    protected $fillable = [
        'case_id',
        'created_by',
        'created',
        'field',
        'event',
        'value',
        'field_id',
    ];
}
