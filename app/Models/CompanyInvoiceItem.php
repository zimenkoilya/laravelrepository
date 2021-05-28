<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInvoiceItem extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'company_invoices_items';
    protected $fillable = [
        'invoice_id',
        'type_id',
        'paid',
        'qty',
        'description',
        'unit_price',
        'total',
        'user_id',
        'created',
    ];
}
