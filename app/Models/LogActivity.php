<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'log_activity';
    protected $fillable = [
        'case_id',
        'message',
        'note',
        'type',
        'type_id',
        'created_by',
        'created',
        'pkid',
    ];
}
