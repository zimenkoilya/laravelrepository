<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustRamDoc extends Model
{
    use HasFactory;
    protected $table = "trust_ram_docs";
    protected $fillble = [
        'trust_account_id',
        'document_id',
        'case_id',
        'document_type',
        'document_status',
        'created',
        'updated',
    ];
}
