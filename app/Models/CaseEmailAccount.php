<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseEmailAccount extends Model
{
    use HasFactory;
    protected $table = "case_email_accounts";
    protected $fillable = [
        'case_id',
        'prefix',
        'domain_alias_id',
        'created',
        'modified',
        'created_by',
        'modified_by',
    ];
}
