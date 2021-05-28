<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusGroup extends Model
{
    use HasFactory;
    protected $table = "status_groups";
    protected $fillable = [
        'company_id',
        'name',
        'created_by',
        'updated_by',
    ];
}
