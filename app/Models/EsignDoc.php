<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsignDoc extends Model
{
    use HasFactory;
    protected $table = "esign_docs";
    protected $fillable = [
        'company_id',
        'case_id',
        'form_id',
        'document_key',
        'latest_document_key',
        'final_version_key',
        'last_action',
        'status',
        'created',
        'updated',
        'active',
        'category_id',
        'sign_url',
        'ip_address',
    ];
}
