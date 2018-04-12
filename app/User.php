<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Activity;
use App\Profile;

class User extends Authenticatable
{
    use Notifiable;
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_id', 'department_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
    
    public function socialProviders()
    {
        return $this->hasMany('App\SocialProvider');
    }
    
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
    
    public function getWeekUsedHours()
    {
        return DB::select('CALL USP_GET_WEEK_USER_HOURS(?)', array($this->id))[0];
    }
}
