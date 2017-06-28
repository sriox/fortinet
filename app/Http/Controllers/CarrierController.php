<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrier;

class CarrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carriers = Carrier::withTrashed()->get()->sortBy('name');
        return view('carrier.index', ['carriers' => $carriers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('carrier.create');
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
            'name' => 'required|unique:carriers'
        ]);
        
        Carrier::create([
            'name' => $request->input('name')
        ]);
        
        return redirect()->route('carriers.index')->with('msg', 'The carrier '.$request->input('name').' was created');
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
        $carrier = Carrier::find($id);
        return view('carrier.edit', ['carrier' => $carrier]);
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
        $this->validate($reques, [
            'name' => 'required|unique:carriers'
        ]);
        
        $carrier = Carrier::find($id);
        
        $carrier->name = $request->input('name');
        
        $carrier->save();
        
        return redirect()->route('carriers.index')->with('msg', 'The carrier '.$request->input('name').' was updated');
    }
    
    public function delete($id)
    {
        $carrier = Carrier::withTrashed()->find($id);
        if($carrier->trashed()){
            $carrier->restore();
            $action = 'activated';
        }else{
            $carrier->delete();
            $action = 'inactivated';
        }
        
        return redirect()->back()->with('msg', 'The technology '.$carrier->name.' was '.$action);
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
