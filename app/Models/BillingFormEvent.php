<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingFormEvent extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'billing_forms_events';

    protected $fillable = [
        'billing_form_id',
        'event'
    ];

    /**
     * Get the billing_form.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billing_form()
    {
        return $this->belongsTo(BillingForm::class, 'billing_form_id');
    }
}
