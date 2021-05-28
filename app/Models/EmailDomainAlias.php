<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailDomainAlias extends Model
{
    use HasFactory;
    protected $table = "email_domain_aliases";
    protected $fillable = [
        'name',
        'active',
    ];
}
