<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFinancing extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_financing';
    protected $fillable = [
        'user_id',
        'financing_pin',
        'financing_key',
        'financing_code',
        'company_id',
    ];
}
