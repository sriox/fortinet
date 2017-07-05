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
        'name', 'email', 'password', 'profile_id'
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
    
    public function getCurrentWeekHours()
    {
        return DB::select('SELECT IFNULL(SUM(time_used), 0) as hours
                                FROM activities
                                WHERE user_id = '.$this->id.' AND DATE >= CURDATE() - INTERVAL (WEEKDAY(CURDATE())) DAY AND DATE <= CURDATE() - INTERVAL (WEEKDAY(CURDATE())-6) DAY')[0];
    }
}
