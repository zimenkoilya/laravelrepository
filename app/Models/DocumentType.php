<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;
    protected $table = "document_types";
    protected $fillable = [
        'company_id',
        'name',
        'active',
        'poi',
        'vertical_id',
    ];
}
