<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditreportLog extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'creditreport_log';
    protected $fillable = [
        'report_id',
        'message',
        'user',
        'created',
        'time',
    ];
}
