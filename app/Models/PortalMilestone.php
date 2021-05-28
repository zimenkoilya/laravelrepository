<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortalMilestone extends Model
{
    use HasFactory;
    protected $table = "portal_milestones";
    protected $fillable = [
        'name',
        'sort',
    ];
}
