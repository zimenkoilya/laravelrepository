<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentGroup extends Model
{
    use HasFactory;
    protected $table = "document_groups";
    protected $fillable = [
        'group_id',
        'group_name',
    ];
}
