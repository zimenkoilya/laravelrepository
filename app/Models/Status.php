<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\CompanyAndSystemOwnScope;
use App\Scopes\ActiveScope;

class Status extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'next_status_id',
        'group_id',
        'department_route_id',
        'milestone_id',
        'portal_milestone_id',
        'action_id',
        'expiry_action_id',
        'expiry_days',

        'name',
        'description',
        'type',
        'level',
        'sort',
        'payable',
        'shared',
        'anytime',
        'system',
        'active',
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
        static::addGlobalScope(new CompanyAndSystemOwnScope());
        static::addGlobalScope(new ActiveScope());
    }

    /**
     * Get the group of the status.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(StatusGroup::class, 'group_id');
    }
}
