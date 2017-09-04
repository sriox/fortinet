<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getBriefActivityExecuted()
    {
        return implode(' ', array_slice(explode(' ', $this->activity_executed), 0, 10));
    }
    
    static public function getQuarterTimeByTerritory($year, $quarter, $departmentId, $userId)
    {
        $data = DB::select('CALL USP_GET_QUARTER_TIME_BY_TERRITORY(?, ?, ?, ?)', array($year, $quarter, $departmentId, $userId));
        
        return $data;
    }
    
    static public function getQuarterTimeByTechnology($year, $quarter, $departmentId, $userId)
    {
        $data = DB::select('CALL USP_GET_QUARTER_TIME_BY_TECHNOLOGY(?, ?, ?, ?)', array($year, $quarter, $departmentId, $userId));
        
        return $data;
    }
    
    static public function getQuarterTimeByCountry($year, $quarter, $departmentId, $userId)
    {
        $data = DB::select('CALL USP_GET_QUATER_TIME_BY_COUNTRY(?, ?, ?, ?)', array($year, $quarter, $departmentId, $userId));
        
        return $data;
    }
    
    static public function getQuarterTimeByActivityType($year, $quarter, $departmentId, $userId)
    {
        $data = DB::select('CALL USP_GET_QUARTER_TIME_BY_ACTIVITY_TYPE(?, ?, ?, ?)', array($year, $quarter, $departmentId, $userId));
        
        return $data;
    }
    
    static public function getQuarterTimeByUser($year, $quarter, $departmentId, $userId)
    {
        $data = DB::select('CALL USP_GET_QUARTER_TIME_BY_USER(?, ?, ?, ?)', array($year, $quarter, $departmentId, $userId));
        
        return $data;
    }

    public function works(){
        return $this->hasMany('App\Work');
    }

    public function getTotalTime()
    {
        $time = 0;

        foreach($this->works as $work){
            $time = $time + $work->time;
        }

        return $time;
    }

    
}
