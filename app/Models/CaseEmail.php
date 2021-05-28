<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseEmail extends Model
{
    use HasFactory;
    protected $table = "case_emails";
    protected $fillable = [
        'case_id',
        'user_id',
        'subject',
        'body',
        'type',
        'created',
    ];
}
