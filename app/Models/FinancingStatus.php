<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingStatus extends Model
{
    use HasFactory;
    protected $table = "financing_statuses";
    protected $fillable = [
        'name'
    ];
}
