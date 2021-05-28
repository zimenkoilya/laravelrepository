<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseContact extends Model
{
    use HasFactory;
    protected $table = "case_contacts";
    protected $fillable = [
        'case_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'primary_phone',
        'secondary_phone',
        'mobile_phone',
        'ssn',
        'bod',
        'fax',
        'address',
        'address_2',
        'city',
        'state',
        'zip',
        'country',
        'timezone',
        'title',
        'dpp_contact_id',
        'created',
        'updated',
        'ip_address',
        'direct_mail_id',
        'credit_score',
        'cai',
        'vendor_id',
    ];
}
