<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkCompanySetting extends Model
{
    use HasFactory;
    protected $table = "mk_company_settings";
    protected $fillable = [
        'company_id',
        'short_code',
        'cost_per_sms',
        'cost_per_rvm',
        'parent_id',
    ];
}
