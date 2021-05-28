<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\CompanyOwnScope;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'group_id',
        'trigger_id',
        'view_id',
        'activity_id',
        'name',
        'description',
        'tracking',
        'set_task',
        'in_batch',
        'system',
        'is_system',
        'locked',
        'shared',
        'anytime',
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
     * Get the shared departments of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the action group of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(ActionGroup::class, 'group_id');
    }

    /**
     * Get the activity of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    /**
     * Get the activities.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'actions_activities');
    }

    /**
     * Get the statuses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statuses()
    {
        return $this->belongsToMany(Activity::class, 'actions_statuses');
    }

    /**
     * Get the user created the resource.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creater()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user updated the resource.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
