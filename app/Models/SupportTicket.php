<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'support_ticket';
    protected $fillable = [
        'severity',
        'context',
        'follow_up',
        'comment',
        'created',
        'created_by',
        'page',
        'ip',
        'repro',
        'status',
        'due',
        'category_id',
        'subcat_id',
        'assigned_to',
    ];
}
