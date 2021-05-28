<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Scopes\ActiveScope;

class AccountingType extends Model
{
    use HasFactory;

    protected $table = "accounting_types";
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

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}
