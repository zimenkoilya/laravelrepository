<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'case_id',
        'counts',
        'status',
        'last_contact',
        'status_updated'
    ];

    /**
     * Get the case.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cases()
    {
        return $this->belongsTo(Cases::class, 'case_id');
    }
}
