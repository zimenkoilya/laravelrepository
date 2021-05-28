<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardWidget extends Model
{
    use HasFactory;
    protected $table = "dashboard_widgets";
    protected $fillable = [
        'dashboard_panels_id',
        'widget_model',
        'widget_type',
        'widget_range',
        'widget_type_id',
        'x',
        'y',
        'h',
        'w',
        'i',
        'filter_date',
        'created',
        'updated',
        'created_by',
        'widget_status',
    ];
}
