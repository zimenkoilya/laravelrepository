<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\CompanyOwnScope;

class BillingFormSetting extends Model
{
    use HasFactory;
    protected $table = "billing_form_settings";
    protected $fillable = [
        'company_id',
        'email_id',
        'sms_id'
    ];


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new CompanyOwnScope());
    }

    /**
     * Get the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
