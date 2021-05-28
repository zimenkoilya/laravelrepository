<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusExpiration extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statuses_expirations';
    protected $fillable = [
        'company_id',
        'status_id',
        'expr_days',
        'action_id',
        'created_by',
        'created',
        'updated_by',
        'updated',
    ];
}
