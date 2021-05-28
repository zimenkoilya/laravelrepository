<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardWidgetType extends Model
{
    use HasFactory;
    protected $table = "dahsboard_widget_types";
    protected $fillable = [
        'name',
        'visual_'
    ];
}
