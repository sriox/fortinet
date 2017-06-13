<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Country;
use App\ActivityType;
use App\Se;
use App\Technology;
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
        
        return view('activity.create', [
            'countries' => $countries,
            'ses' => $ses,
            'technologies' => $technologies,
            'activityTypes' => $activityTypes
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
            'quarter' => 'required',
            'country' => 'required',
            'technology' => 'required',
            'se' => 'required',
            'description' => 'required',
            'timeUsed' => 'required|integer'
        ]);
        
        Activity::create([
            'user_id' => Auth::id(),
            'activity_type_id' => $request->input('activityType'),
            'date' => $request->input('date'),
            'quarter' => $request->input('quarter'),
            'country_id' => $request->input('country'),
            'technology_id' => $request->input('technology'),
            'smart_ticket' => $request->input('smartTicket'),
            'se_id' => $request->input('se'),
            'customer' => $request->input('customer'),
            'description' => $request->input('description'),
            'activity_executed' => $request->input('activityExecuted'),
            'execution_date' => $request->input('executionDate'),
            'time_used' => $request->input('timeUsed')
        ]);
        
        return redirect()->route('activities.index');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
