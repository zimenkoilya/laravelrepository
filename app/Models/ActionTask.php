<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionTask extends Model
{
    use HasFactory;

    protected $table = "action_tasks";
    protected $fillable = [
        'name',
        'label',
        'options_table',
        'company_based',
        'created_by',
        'updated_by'
    ];

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
