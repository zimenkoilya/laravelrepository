<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanReturn extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pan_return';
    protected $fillable = [
        'CompanyID',
        'CompanyName',
        'PayorID',
        'TransactionID',
        'PaymentDueDate',
        'ReturDate',
        'ReturnAmount',
        'ReturnCode',
        'ReturnDescription',
    ];
}
