<?php

namespace App;
use App\Activity;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name'
    ];
    
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}
