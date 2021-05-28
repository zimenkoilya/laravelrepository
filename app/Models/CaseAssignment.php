<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseAssignment extends Model
{
    use HasFactory;
    protected $table = "case_assignments";
    protected $fillable = [
        'case_id',
        'department_id',
        'user_id',
        'created',
        'created_by',
        'updated',
        'updated_by',
    ];
}
