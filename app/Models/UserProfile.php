<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = "user_profile";
    protected $fillable = [
        'nickname',
        'tagline',
        'description',
        'office_phone',
        'mobile_phone',
        'fax_number',
        'picture_filename',
        'tmp_filename',
        'birthday',
        'gender',
        'website_url',
        'skype_handle',
        'pin',
        'key',
        'custom1',
        'custom2',
        'custom3',
    ];
}
