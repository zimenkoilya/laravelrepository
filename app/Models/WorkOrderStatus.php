<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrderStatus extends Model
{
    use HasFactory;
    protected $table = "work_order_statuses";
    protected $fillable = [
        'company_id',
        'name',
        'color',
    ];
}
