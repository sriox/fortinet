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
        $sql = 'SELECT c.territory, CONVERT(SUM(time_used), signed) AS time_used
                FROM activities a, countries c, users u
                WHERE c.id = a.country_id 
                AND a.quarter = '.$quarter.' 
                AND YEAR(a.date) = '.$year.' 
                AND u.id = a.user_id' 
                .($departmentId != 0?' AND (u.department_id = '.$departmentId.')':'')
                .($userId != 0?' AND (u.id = '.$userId.')':'').'
                GROUP BY c.territory';
        
        $data = DB::select($sql);
        
        return $data;
    }
    
    static public function getQuarterTimeByTechnology($year, $quarter, $departmentId, $userId)
    {
        $sql = 'SELECT t.name, CONVERT(SUM(time_used), signed) AS time_used
                FROM activities a, technologies t, users u
                WHERE t.id = a.technology_id 
                AND a.quarter = '.$quarter.' 
                AND YEAR(a.date) = '.$year.' 
                AND u.id = a.user_id' 
                .($departmentId != 0?' AND (u.department_id = '.$departmentId.')':'')
                .($userId != 0?' AND (u.id = '.$userId.')':'').'
                GROUP BY t.name';
        
        $data = DB::select($sql);
        
        return $data;
    }
    
    static public function getQuarterTimeByCountry($year, $quarter, $departmentId, $userId)
    {
        $sql = 'SELECT c.name, CONVERT(SUM(time_used), signed) AS time_used
                FROM activities a, countries c, users u
                WHERE c.id = a.country_id AND a.quarter = '.$quarter.' 
                AND YEAR(a.date) = '.$year.' 
                AND u.id = a.user_id' 
                .($departmentId != 0?' AND (u.department_id = '.$departmentId.')':'')
                .($userId != 0?' AND (u.id = '.$userId.')':'').'
                GROUP BY c.name';
        
        $data = DB::select($sql);
        
        return $data;
    }
    
    static public function getQuarterTimeByActivityType($year, $quarter, $departmentId, $userId)
    {
        $sql = 'SELECT t.name, CONVERT(SUM(time_used), signed) AS time_used
                FROM activities a, activity_types t, users u
                WHERE t.id = a.activity_type_id 
                AND a.quarter = '.$quarter.' 
                AND YEAR(a.date) = '.$year.' 
                AND u.id = a.user_id' 
                .($departmentId != 0?' AND (u.department_id = '.$departmentId.')':'')
                .($userId != 0?' AND (u.id = '.$userId.')':'').'
                GROUP BY t.name';
        
        $data = DB::select($sql);
        
        return $data;
    }
    
    static public function getQuarterTimeByUser($year, $quarter, $departmentId, $userId)
    {
        $sql = 'SELECT u.name, CONVERT(SUM(time_used), signed) AS time_used
                FROM activities a, users u
                WHERE a.quarter = '.$quarter.' 
                AND YEAR(a.date) = '.$year.' 
                AND u.id = a.user_id' 
                .($departmentId != 0?' AND (u.department_id = '.$departmentId.')':'')
                .($userId != 0?' AND (u.id = '.$userId.')':'').'
                GROUP BY u.name';
        
        $data = DB::select($sql);
        
        return $data;
    }
}
