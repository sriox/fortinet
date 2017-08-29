<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Activity;
use App\Country;
use App\ActivityType;
use App\Se;
use App\Technology;
use App\Carrier;
use App\Config;
use Auth;
use App\User;
use App\Department;
use App\Work;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usedHours = Auth::user()->getWeekUsedHours();
        $weekHours = Config::where('key', '=', 'WEEK_HOURS')->first();
        
        
        $activities = Activity::where('user_id', '=', Auth::id())->get()->sortByDesc('date');
        return view('activity.index', ['activities' => $activities, 'usedHours' => $usedHours->hours, 'weekHours' => $weekHours->value]);
    }
    
    public function all()
    {
        $activities = DB::select('CALL USP_GET_ALL_ACTIVITIES');
        // $activities = Activity::limit(50)->get();
        return view('activity.all', ['activities' => $activities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::id());
        $userDepartment = Department::find($user->department->id);


        $countries = Country::all()->sortBy('name');
        $ses = Se::all()->sortBy('name');
        $technologies = Technology::whereNull('deleted_at')->get()->sortBy('name');
        $activityTypes = $userDepartment->activityTypes;
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
            'smartTicket' => 'nullable|numeric',
            'timeUsed' => 'numeric',
            'carrier' => 'required',
            'activityExecuted' => 'required'
        ]);
        
        DB::transaction(function() use ($request){
            $activity = Activity::create([
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
                //'activity_executed' => $request->input('activityExecuted'),
                //'time_used' => $request->input('timeUsed'),
                'carrier_id' => $request->input('carrier')
            ]);

            Work::create([
                'activity_id' => $activity->id,
                'date' => $activity->date,
                'description' => $request->input('activityExecuted'),
                'time' => $request->input('timeUsed'),
                'year' => $this->getYear($activity->date),
                'quarter' => $this->quarter($activity->date),
                'month' => $this->getMonth($activity->date)
            ]);
        });

        
        
        return redirect()->route('activities.index');
    }

    private function getYear($ts){
        $date = date_create($ts);
        return (int)date_format($date, 'Y');
    }

    private function getMonth($ts){
        $date = date_create($ts);
        return (int)date_format($date, 'n');
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
        $activity = Activity::find($id);
        return view('activity.show', ['activity' => $activity]);
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
        $copy = $request->has('copy') ? $request->get('copy'): false;

        //get current user to filter activity types by its department
        $user = User::find(Auth::id());
        $userDepartment = $user->department;

        //If it is cloning action the id should be zero
        if($copy) $activity->id = 0;
        
        //Get all the parameter options
        $countries = Country::all()->sortBy('name');
        $ses = Se::all()->sortBy('name');
        $technologies = Technology::whereNull('deleted_at')->get()->sortBy('name');
        $activityTypes = $userDepartment->activityTypes;
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
            'carrier' => 'required',
            'smartTicket' => 'nullable|numeric'
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
        //$activity->activity_executed = $request->input('activityExecuted');
        //$activity->time_used = $request->input('timeUsed');
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

        //buscar registros de work para eliminar
        $works = Work::where('activity_id', '=', $activity->id);
        $works->delete();

        $activity->delete();
        
        return redirect()->back()->with('msg', 'The activity was deleted');
    }

    public function copy($id)
    {
        $activity = Activity::find($id);
        return view('activities.copy', [
            'activity' => $activity
        ]);
    }

    public function saveWork(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date',
            'description' => 'required',
            'time' => 'required|numeric'
        ]);

        if($request->input('workId') == 0){
            Work::create([
                'activity_id' => $request->input('activityId'),
                'date' => $request->input('date'),
                'description' => $request->input('description'),
                'time' => $request->input('time'),
                'year' => $this->getYear($request->input('date')),
                'quarter' => $this->quarter($request->input('date')),
                'month' => $this->getMonth($request->input('date'))
            ]);
        }else{
            $work = Work::find($request->input('workId'));
            $work->date = $request->input('date');
            $work->description = $request->input('description');
            $work->time = $request->input('time');
            $work->save();
        }

        

        return redirect()->back();
    }

    public function deleteWork($id)
    {
        Work::destroy($id);
        return redirect()->back();
    }

}
