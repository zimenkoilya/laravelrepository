<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\CompanyOwnScope;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'group_id',
        'name',
        'description',
        'active',
        'system',
        'phone',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'active' => 'boolean'
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
     * Get the shared departments of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the shared departments of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(CampaignGroup::class, 'group_id');
    }
}
