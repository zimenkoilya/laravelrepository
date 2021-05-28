<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\ActiveScope;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'broker_user_id',

        'name',
        'long_name',
        'legal_name',
        'email',
        'case_email_domain',
        'logo',

        'office_address',
        'office_address_2',
        'office_city',
        'office_state',
        'office_zip',
        'office_fax',
        'office_phone',

        'cs_phone',
        'cs_email',

        'website',
        'client_portal_url',
        'social_facebook',
        'social_instagram',
        'social_twitter',
        'social_googleplus',
        'social_linkedin',
        'active',
        'suspended',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'active' => 'boolean',
        'suspended' => 'boolean'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        // static::addGlobalScope(new ActiveScope());
    }
    
    /**
     * Scope a query to only include active items.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Scope a query to only include inactive.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive($query)
    {
        return $query->where('active', false);
    }

    /**
     * Scope a query to only include suspended items.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSuspended($query)
    {
        return $query->where('suspended', true);
    }

    /**
     * Get the parent company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Company::class, 'parent_id');
    }

    /**
     * Get children companies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function children()
    {
        return $this->hasMany(Company::class, 'parent_id');
    }

    /**
     * Get the networks of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function networks()
    {
        return $this->hasMany(Network::class);
    }

    /**
     * Get the regions of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    /**
     * Get the departments of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    /**
     * Get the shared departments of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sharedDepartments()
    {
        return $this->belongsToMany(Department::class, 'departments_shared');
    }

    /**
     * Get the campaign groups of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign_groups()
    {
        return $this->hasMany(CampaignGroup::class);
    }

    /**
     * Get the campaigns of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    /**
     * Get the users of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the parent company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function broker()
    {
        return $this->hasOne(User::class, 'broker_user_id');
    }

    public function accounting_types()
    {
        return $this->belongsToMany(AccountingType::class, 'accounting_types_companies', 'company_id', 'accounting_type_id');
    }

    public function payment_schedule_types()
    {
        return $this->belongsToMany(PaymentScheduleType::class, 'payment_schedule_types_cos', 'company_id', 'schedule_type_id');
    }

    public function document_templates()
    {
        return $this->belongsToMany(DocumentTemplate::class, 'documents_companies', 'company_id', 'form_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'services_companies', 'company_id', 'service_id');
    }

    /**
     * Get the Calendar option associated with the company.
     */
    public function calendar_option()
    {
        return $this->hasOne(CalendarOption::class);
    }
}
