<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\CompanyOwnScope;

class Trigger extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'trigger_type_id',
        'action_id',
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
     * Get the shared departments of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trigger_type()
    {
        return $this->belongsTo(TriggerType::class);
    }

    /**
     * Get the shared departments of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function action()
    {
        return $this->belongsTo(Action::class);
    }
}
