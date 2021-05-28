<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateSms extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'template_sms';
    protected $fillable = [
        'company_id',
        'name',
        'from',
        'to',
        'message',
        'segments',
        'created',
        'created_by',
        'updated',
        'updated_by',
        'fixed',
        'ct_id',
    ];
}
