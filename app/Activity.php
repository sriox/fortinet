<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'activity_type_id',
        'country_id',
        'technology_id',
        'se_id',
        'date',
        'quarter',
        'smart_ticket',
        'customer',
        'description',
        'activity_executed',
        'execution_date',
        'time_used',
        'carrier_id'
    ];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function activityType(){
        return $this->belongsTo('App\ActivityType')->withTrashed();
    }
    public function country()
    {
        return $this->belongsTo('App\Country')->withTrashed();
    }
    public function technology()
    {
        return $this->belongsTo('App\Technology')->withTrashed();
    }
    public function se()
    {
        return $this->belongsTo('App\Se')->withTrashed();
    }
    
    public function carrier()
    {
        return $this->belongsTo('App\Carrier')->withTrashed();
    }
    
    public function getBriefDescription()
    {
        return implode(' ', array_slice(explode(' ', $this->description), 0, 10));
    }
}
