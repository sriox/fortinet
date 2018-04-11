<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technology;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::withTrashed()->get()->sortBy('name');
        return view('technology.index', ['technologies' => $technologies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('technology.create');
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
            'name' => 'required|unique:technologies'
        ]);
        
        Technology::create([
            'name' => $request->input('name')
        ]);
        
        return redirect()->route('technologies.index');
    }
    
    public function delete($id)
    {
        $technology = Technology::withTrashed()->find($id);
        if($technology->trashed()){
            $technology->restore();
            $action = 'activated';
        }else{
            $technology->delete();
            $action = 'inactivated';
        }
        
        return redirect()->back()->with('msg', 'The technology '.$technology->name.' was '.$action);
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
        $technology = Technology::find($id);
        return view('technology.edit', ['technology' => $technology]);
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
            'name' => 'required|unique:technologies'
        ]);
        
        $technology = Technology::find($id);
        $technology->name = $request->input('name');
        $technology->save();
        
        return redirect()->route('technologies.index')->with('msg', 'Technology '.$request->name.' was updated');
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
