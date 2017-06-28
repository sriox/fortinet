<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Country;
use App\ActivityType;
use App\Se;
use App\Technology;
use App\Carrier;
use Auth;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::where('user_id', '=', Auth::id())->get()->sortByDesc('date');
        return view('activity.index', ['activities' => $activities]);
    }
    
    public function all()
    {
        $activities = Activity::All()->sortBy('user_id');
        return view('activity.all', ['activities' => $activities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all()->sortBy('name');
        $ses = Se::all()->sortBy('name');
        $technologies = Technology::whereNull('deleted_at')->get()->sortBy('name');
        $activityTypes = ActivityType::all()->sortBy('name');
        $carriers = Carrier::all()->sortBy('name');
        
        return view('activity.create', [
            'countries' => $countries,
            'ses' => $ses,
            'technologies' => $technologies,
            'activityTypes' => $activityTypes,
            'carriers' => $carriers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'activityType' => 'required',
            'date' => 'required',
            'country' => 'required',
            'technology' => 'required',
            'se' => 'required',
            'description' => 'required',
            'timeUsed' => 'required|integer',
            'customer' => 'max:255',
            'smartTicket' => 'max:255',
            'timeUsed' => 'numeric',
            'carrier' => 'required'
        ]);
        
        Activity::create([
            'user_id' => Auth::id(),
            'activity_type_id' => $request->input('activityType'),
            'date' => $request->input('date'),
            'quarter' => $this->quarter(date($request->input('date'))),
            'country_id' => $request->input('country'),
            'technology_id' => $request->input('technology'),
            'smart_ticket' => $request->input('smartTicket'),
            'se_id' => $request->input('se'),
            'customer' => $request->input('customer'),
            'description' => $request->input('description'),
            'activity_executed' => $request->input('activityExecuted'),
            'time_used' => $request->input('timeUsed'),
            'carrier_id' => $request->input('carrier')
        ]);
        
        return redirect()->route('activities.index');
    }
    
    private function quarter($ts) {
        $date = date_create($ts);
        $month = (int)date_format($date, 'm');
        $quarter = 0;
        if($month < 4)
            $quarter = 1;
        else if($month >=4 && $month < 7)
            $quarter = 2;
        else if($month >=7 && $month < 10)
            $quarter = 3;
        else if($month >=10 && $month < 13)
            $quarter = 4;
        
        return $quarter;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $activity = Activity::find($id);
        $page = $request->get('page');
        
        $countries = Country::all()->sortBy('name');
        $ses = Se::all()->sortBy('name');
        $technologies = Technology::whereNull('deleted_at')->get()->sortBy('name');
        $activityTypes = ActivityType::all()->sortBy('name');
        $carriers = Carrier::all()->sortBy('name');
        
        return view('activity.edit', [
            'activity' => $activity,
            'countries' => $countries,
            'ses' => $ses,
            'technologies' => $technologies,
            'activityTypes' => $activityTypes,
            'carriers' => $carriers,
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'activityType' => 'required',
            'date' => 'required',
            'country' => 'required',
            'technology' => 'required',
            'se' => 'required',
            'description' => 'required',
            'timeUsed' => 'required|numeric',
            'carrier' => 'required'
        ]);
        
        $activity = Activity::find($id);
        
        $activity->activity_type_id = $request->input('activityType');
        $activity->date = $request->input('date');
        $activity->quarter = $this->quarter(date($request->input('date')));
        $activity->country_id = $request->input('country');
        $activity->technology_id = $request->input('technology');
        $activity->smart_ticket = $request->input('smartTicket');
        $activity->se_id = $request->input('se');
        $activity->customer = $request->input('customer');
        $activity->description = $request->input('description');
        $activity->activity_executed = $request->input('activityExecuted');
        $activity->time_used = $request->input('timeUsed');
        $activity->carrier_id = $request->input('carrier');
        
        $activity->save();
        
        return redirect()->route('activities.'.$request->get('page'))->with('msg', 'The activity was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();
        
        return redirect()->back()->with('msg', 'The activity was deleted');
    }
}
