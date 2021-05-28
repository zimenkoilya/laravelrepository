<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditreportLineStatus extends Model
{
    use HasFactory;
    protected $table = "creditreport_line_statuses";
    protected $fillable = [
        'company_id',
        'name',
    ];
}
