<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'case_id',
        'user_id',
        'extension',
        'campaign_id',
        'duration',
        'label',
        'label_id',
        'result_id',
        'type_id',
        'disposition',
        'direction',
        'source',
        'dst',
        'filename',
        'queue',
        'did',
        'created',
        'note',
        'upload',
        'finance_post',
        'ext',
        'filesize',
        'context',
        'uuid',
        'sip_id',
        'transfer',
        'url',
        'review',
    ];
}
