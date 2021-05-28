<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanLog extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pan_log';
    protected $fillable = [
        'created',
        'pan_confirm',
        'pan_return',
        'pan_balance',
        'pan_verify',
        'notes',
    ];
}
