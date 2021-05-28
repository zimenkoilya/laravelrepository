<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAtn extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders_atn';
    protected $fillable = [
        'case_id',
        'order_details',
        'created',
        'updated',
        'created_by',
        'updated_by',
    ];
}
