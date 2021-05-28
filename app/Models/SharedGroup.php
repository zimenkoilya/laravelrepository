<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedGroup extends Model
{
    use HasFactory;
    protected $table = "shared_groups";
    protected $fillable = [
        'company_id',
        'name',
    ];
}
