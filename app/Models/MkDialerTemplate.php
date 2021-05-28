<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkDialerTemplate extends Model
{
    use HasFactory;
    protected $table = "mk_dialer_templates";
    protected $fillable = [
        'company_id',
        'title',
        'agent_data',
        'agent_count',
        'created',
        'updated',
        'created_by',
        'active',
    ];
}
