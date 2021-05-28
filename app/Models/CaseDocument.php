<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseDocument extends Model
{
    use HasFactory;
    protected $table = "case_documents";
    protected $fillable = [
        'case_id',
        'name',
        'comments',
        'file',
        'filesize',
        'ext',
        'created_by',
        'created_date',
        's3',
        'folder',
        'type_id',
        'updated',
        'updated_by',
        'email_id',
        'client',
        'uuid',
        'url',
    ];
}
