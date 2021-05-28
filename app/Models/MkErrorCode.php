<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkErrorCode extends Model
{
    use HasFactory;
    protected $table = "mk_error_codes";
    protected $fillable = [
        'error_code',
        'service_type',
        'description',
    ];
}
