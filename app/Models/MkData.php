<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkData extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mk_data';
    protected $fillable = [
        'company_id',
        'list_id',
        'status_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'created',
        'case_id',
        'campaign_id',
        'carrier_type',
    ];
}
