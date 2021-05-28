<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldAccount extends Model
{
    use HasFactory;
    protected $table = "form_field_accounts";
    protected $fillable = [
        'account_id',
        'form_field_id',
        'created',
    ];
}
