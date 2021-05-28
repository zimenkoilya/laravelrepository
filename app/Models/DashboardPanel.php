<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardPanel extends Model
{
    use HasFactory;
    protected $table = "dahsboard_panel";
    protected $fillable = [
        'company_id',
        'user_id',
        'dashboard_type',
        'created',
        'created_by',
        'status',
        'favorite',
    ];
}
