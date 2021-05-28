<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailImap extends Model
{
    use HasFactory;
    protected $table = "email_imaps";
    protected $fillable = [
        'company_id',
        'imap_username',
        'imap_password',
        'deliminator',
        'created',
        'created_by',
        'active',
    ];

}
