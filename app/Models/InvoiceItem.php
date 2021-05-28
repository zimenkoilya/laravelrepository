<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoices_items';
    protected $fillable = [
        'invoice_id',
        'case_id',
        'type_id',
        'description',
        'qty',
        'unit_price',
        'user_id',
        'amount',
        'frequency',
        'cycle_period',
        'cycle_count',
        'created',
        'created_by',
        'updated',
        'updated_by',
    ];
}
