<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'company_profile';
    protected $fillable = [
        'processor_id',
        'user_fee',
        'processing_fee',
        'renewal_fee',
    ];
}
