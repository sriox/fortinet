<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Activity;
use App\Department;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $year = $request->has('y')? $request->input('y'): date("Y");
        $quarter = $request->has('q')? $request->input('q'): ceil(date('n', time()) / 3);
        $departmentId = $request->has('d')? $request->input('d'): 0;
        $userId = $request->has('u')? $request->input('u'): 0;

        $departments = Department::all()->sortBy('name');
        $users = User::all()->sortBy('name');
        
        $userData = Activity::getQuarterTimeByUser($year, $quarter, $departmentId, $userId);
        $activityTypeData = Activity::getQuarterTimeByActivityType($year, $quarter, $departmentId, $userId);
        $territoryData = Activity::getQuarterTimeByTerritory($year, $quarter, $departmentId, $userId);
        $countryData = Activity::getQuarterTimeByCountry($year, $quarter, $departmentId, $userId);
        $technologyData = Activity::getQuarterTimeByTechnology($year, $quarter, $departmentId, $userId);
        $years = $this->getValidYears();

        return view('home', [
            'userData' => $userData, 
            'activityTypeData' => $activityTypeData,
            'territoryData' => $territoryData,
            'countryData' => $countryData,
            'technologyData' => $technologyData,
            'year' => $year,
            'quarter' => $quarter,
            'years' => $years,
            'departmentId' => $departmentId,
            'departments' => $departments,
            'users' => $users,
            'userId' => $userId
        ]);
    }
    
    private function getValidYears()
    {
        return DB::select('SELECT DISTINCT YEAR(DATE) as year
                            FROM activities');
    }
}
