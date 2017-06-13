<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Activity;

class Country extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $fillable = ['name', 'territory']; 
    
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}
