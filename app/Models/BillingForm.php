<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingForm extends Model
{
    use HasFactory;
    protected $table = "billing_forms";
    protected $fillable = [
        'case_id',
        'email_id',
        'sms_id',
        'billing_type',
        'send_type',
        'phone',
        'email',
        'uuid',
        'token',
        'expired',
        'submitted_at',
        'created_by'
    ];

    /**
     * Get the case.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cases()
    {
        return $this->belongsTo(Cases::class, 'case_id');
    }

    /**
     * Get billing_form_events.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billing_form_events()
    {
        return $this->hasMany(BillingFormEvent::class, 'billing_form_id');
    }
}
