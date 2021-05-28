<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLabel extends Model
{
    use HasFactory;
    protected $table = "invoice_labels";
    protected $fillable = [
        'name',
        'slug',
        'company_id',
    ];
}
