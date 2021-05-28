<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lists';
    protected $fillable = [
        'type',
        'name',
        'description',
        'created',
        'created_by',
        'company_id',
        'active',
        'filters',
        'company_shared',
        'updated',
        'updated_by',
        'system',
        'counter',
    ];
}
