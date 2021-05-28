<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\CompanyOwnScope;

class AssociateGroup extends Model
{
    use HasFactory;

    protected $table = "associate_groups";
    protected $fillable = [
        'company_id',
        'group_name'
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
     * Get the associates of the group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function associates()
    {
        return $this->hasMany(Associate::class);
    }
}
