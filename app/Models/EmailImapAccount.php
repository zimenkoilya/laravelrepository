<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailImapAccount extends Model
{
    use HasFactory;
    protected $table = "email_imap_accounts";
    protected $fillable = [
        'company_id',
        'login',
        'pw',
        'deliminator',
        'created',
        'active',
    ];
}
