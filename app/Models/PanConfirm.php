<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanConfirm extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pan_confirm';
    protected $fillable = [
        'CompanyID',
        'PayorID',
        'TransactionID',
        'Amount',
        'Date',
        'ResultIndicator',
        'created',
    ];
}
