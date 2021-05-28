<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\CompanyOwnScope;

class Associate extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'associate_group_id',
        'name',
        'created_by',
        'updated_by',
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
     * Get the associate group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function associate_group()
    {
        return $this->belongsTo(AssociateGroup::class, 'associate_group_id');
    }
}
