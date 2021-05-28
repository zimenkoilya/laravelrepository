<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkRvmTemplate extends Model
{
    use HasFactory;
    protected $table = "mk_sms_templates";
    protected $fillable = [
        'company_id',
        'title',
        'file',
        'created',
        'updated',
        'duration',
        'created_by',
        'active',
        'vertical_id',
    ];
}
