<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailValidation extends Model
{
    use HasFactory;
    protected $table = "email_validations";
    protected $fillable = [
        'email_address',
        'isValid',
        'isSendable',
        'isExample',
        'isDisposable',
        'isRole',
        'hasMx',
        'updated',
    ];
}
