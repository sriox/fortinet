<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityType;

class ActivityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activityTypes = ActivityType::withTrashed()->get()->sortBy('name');
        return view('activityType.index', ['activityTypes' => $activityTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activityType.create');
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
            'name' => 'required|unique:activity_types'
        ]);
        
        ActivityType::create([
            'name' => $request->name
        ]);
        
        return redirect()->route('activityTypes.index');
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
        $activityType = ActivityType::find($id);
        return view('activityType.edit', ['activityType' => $activityType]);
    }
    
    public function delete($id)
    {
        $type = ActivityType::withTrashed()->find($id);
        if($type->trashed()){
            $type->restore();
            $action = 'activated';
        }else{
            $type->delete();
            $action = 'inactivated';
        }
        
        return redirect()->back()->with('msg', 'The activity type '.$type->name.' was '.$action);
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
            'name' => 'required|unique:activity_types'
        ]);
        
        $activityType = ActivityType::find($id);
        $activityType->name = $request->input('name');
        $activityType->save();
        
        return redirect()->route('activityTypes.index')->with('msg', 'Activity Type '.$request->name.' was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
