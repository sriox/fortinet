<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Activity;

class Se extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $fillable = ['name'];
    
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}
