<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use App\Scopes\CompanyOwnScope;
use App\Scopes\ActiveScope;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'region_id',
        'department_id',
        'campaign_group_id',
        'dashboard_id',
        'signature_id',

        'type',

        'first_name',
        'last_name',
        'email',
        'password',        
        'mobile',
        'extension',
        'phone_pass',
        'caller_id',
        'wildcard',
        'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'passwd',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'boolean'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'photo_url',
        'display_name'
    ];

    /**
     * Get the profile photo URL attribute.
     *
     * @return string
     */
    public function getPhotoUrlAttribute()
    {
        return vsprintf('https://www.gravatar.com/avatar/%s.jpg?s=200&d=%s', [
            md5(strtolower($this->email)),
            $this->name ? urlencode("https://ui-avatars.com/api/$this->name") : 'mp',
        ]);
    }

    /**
     * Get the display name.
     *
     * @return string
     */
    public function getDisplayNameAttribute()
    {
        if (empty($this->name)) {
            return $this->first_name.' '.$this->last_name;
        }
        return $this->name;
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new CompanyOwnScope());
        // static::addGlobalScope(new ActiveScope());
    }

    /**
     * Get the passwd(FuelPHP Password field) for the user.
     *
     * @return string
     */
    public function getAuthPasswd()
    {
        return $this->passwd;
    }

    /**
     * Get the company of user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the region of user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function region()
    // {
    //     return $this->belongsTo(Region::class);
    // }

    // /**
    //  * Get the department of user.
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function department()
    // {
    //     return $this->belongsTo(Department::class);
    // }

    // /**
    //  * Get the shared departments of the company.
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function campaign_group()
    // {
    //     return $this->belongsTo(CampaignGroup::class);
    // }

    /**
     * Get the dashboard of user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dashboard()
    {
        return $this->belongsTo(Dashboard::class);
    }

    /**
     * Get the user role names
     */
    public function getRoleNamesAttribute()
    {
        return $this->getRoleNames();
    }
}
