<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkVerticalCompany extends Model
{
    use HasFactory;
    protected $table = "mk_verticals_companies";
    protected $fillable = [
        'vertical_id',
        'company_id',
        'tier',
        'rollover',
    ];
}
