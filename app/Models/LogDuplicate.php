<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogDuplicate extends Model
{
    use HasFactory;
    protected $table = "log_duplicates";
    protected $fillable = [
        'case_id',
        'old_campaign_id',
        'new_campaign_id',
        'data',
        'recaptured',
        'created',
    ];
}
