<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Se;

class SeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ses = Se::withTrashed()->get()->sortBy('name');
        return view('se.index', ['ses' => $ses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('se.create');
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
            'name' => 'required|unique:ses'
        ]);
        
        Se::create([
            'name' => $request->input('name')
        ]);
        
        return redirect()->route('se.index');
    }
    
    public function delete($id)
    {
        $se = Se::withTrashed()->find($id);
        if($se->trashed()){
            $se->restore();
            $action = 'activated';
        }else{
            $se->delete();
            $action = 'inactivated';
        }
        
        return redirect()->back()->with('msg', 'The SE '.$se->name.' was '.$action);
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
        $se = Se::find($id);
        return view('se.edit', ['se' => $se]);
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
            'name' => 'required|unique:ses'
        ]);
        
        $se = Se::find($id);
        $se->name = $request->input('name');
        $se->save();
        
        return redirect()->route('se.index')->with('msg', 'SE '.$request->name.' was updated');
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
