<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\CompanyOwnScope;

class CampaignGroup extends Model
{
    use HasFactory;

    protected $table = "campaign_groups";
    protected $fillable = [
        'company_id',
        'name',
        'description',
        'created_by',
        'updated_by'
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

    /**
     * Get the campaigns
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'group_id');
    }

    /**
     * Get the users
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
