<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkList extends Model
{
    use HasFactory;
    protected $table = "mk_lists";
    protected $fillable = [
        'company_id',
        'campaign_id',
        'name',
        'updated_by',
        'data_count',
        'created',
        'created_by',
        'updated',
        'comments',
    ];
}
