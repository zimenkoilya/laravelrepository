<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'name',
        'description',
        'file',
        'data_template',
        'esign',
        'active',
        'group_id',
        'action_id',
        'esign_servicer',
        'account_type_id',
        'upload',
        'document_type_id',
        'secondary_signature',
        'is_bundle',
        'esign_template_id',
        'hook',
        'fields',
        'uuid',
        'uuid_id',
    ];
}
