<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallboard extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wallboard';
    protected $fillable = [
        'company_id',
        'board_uuid',
        'name',
        'type_id',
        'last_update',
        'ip_address',
        'message',
        'update',
        'update_by',
    ];
}
