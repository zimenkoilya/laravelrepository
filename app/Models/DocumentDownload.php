<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentDownload extends Model
{
    use HasFactory;
    protected $table = "document_downloads";
    protected $fillable = [
        'case_id',
        'token',
        'created',
        'type_id',
        'case_document_id',
        'document_id',
        'ip_address',
    ];
}
