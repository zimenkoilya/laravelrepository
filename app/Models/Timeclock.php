<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeclock extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'timeclock';
    protected $fillable = [
        'user_id',
        'start',
        'end',
        'type',
        'function_id',
    ];
}
