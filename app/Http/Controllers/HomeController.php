<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Activity;

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
        $isCarrier = $request->has('c')? $request->input('c'): 0;
        
        $userData = Activity::getQuarterTimeByUser($year, $quarter, $isCarrier);
        $activityTypeData = Activity::getQuarterTimeByActivityType($year, $quarter, $isCarrier);
        $territoryData = Activity::getQuarterTimeByTerritory($year, $quarter, $isCarrier);
        $countryData = Activity::getQuarterTimeByCountry($year, $quarter, $isCarrier);
        $technologyData = Activity::getQuarterTimeByTechnology($year, $quarter, $isCarrier);
        $years = $this->getValidYears();
        //dd($years);
        return view('home', [
            'userData' => $userData, 
            'activityTypeData' => $activityTypeData,
            'territoryData' => $territoryData,
            'countryData' => $countryData,
            'technologyData' => $technologyData,
            'year' => $year,
            'quarter' => $quarter,
            'years' => $years,
            'isCarrier' => $isCarrier
        ]);
    }
    
    private function getValidYears()
    {
        return DB::select('SELECT DISTINCT YEAR(DATE) as year
                            FROM activities');
    }
}
