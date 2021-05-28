<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cases';
    protected $fillable = [
        'company_id',
        'source_id',
        'is_duplicate',
        'action_count',
        'last_action',
        'ip',
        'created_by',
        'updated_by',
    ];
}
