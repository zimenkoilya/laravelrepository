<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingVerify extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'billing_verify';

    protected $fillable = [
        'billing_id',
        'reference_id',
        'service',
        'response',
        'code',
        'created_by',
        'updated_by'
    ];

    /**
     * Get billing.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billing()
    {
        return $this->belongsTo(Billing::class);
    }
}
