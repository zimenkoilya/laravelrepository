<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chat';
    protected $fillable = [
        'case_id',
        'topic',
        'created_date',
        'created_by',
        'updated_date',
    ];
}
