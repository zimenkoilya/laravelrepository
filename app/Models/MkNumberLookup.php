<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkNumberLookup extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mk_number_lookup';
    protected $fillable = [
        'data_id',
        'phone',
        'carrier_type',
        'results',
        'created',
    ];
}
