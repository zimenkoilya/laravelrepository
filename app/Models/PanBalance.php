<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanBalance extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pan_balance';
    protected $fillable = [
        'CompanyID',
        'PayorID',
        'Balance',
        'LastStatus',
        'id',
    ];
}
