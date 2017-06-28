<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrier extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name'];
    
    protected $dates = ['deleted_at'];
    
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}
