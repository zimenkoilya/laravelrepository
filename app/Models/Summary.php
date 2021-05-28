<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;
    protected $table = "summaries";
    protected $fillable = [
        'company_id',
        'name',
        'body',
        'type',
        'updated',
        'updated_by',
        'window_width',
        'window_height',
        'autorefresh',
        'tree',
    ];
}
