<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuplicateFilterRule extends Model
{
    use HasFactory;
    protected $table = "duplicate_filter_rules";
    protected $fillable = [
        'company_id',
        'name',
        'older_than_days',
        'action_id',
        'exclude_status_id',
    ];
}
