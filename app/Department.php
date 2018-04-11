<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Department extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function users(){
        return $this->hasMany('App\User');
    }

    public function activityTypes()
    {
        return $this->belongsToMany('App\ActivityType');
    }
}
