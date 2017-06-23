<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::withTrashed()->get()->sortBy('name');
        return view('country.index', ['countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.create');
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
            'name' => 'required',
            'territory' => 'required'
        ]);
        
        Country::create([
            'name' => $request->input('name'),
            'territory' => $request->input('territory')
        ]);
        
        return redirect()->route('countries.index');
    }
    
    public function delete($id)
    {
        $country = Country::withTrashed()->find($id);
        if($country->trashed()){
            $country->restore();
            $action = 'activated';
        }else{
            $country->delete();
            $action = 'inactivated';
        }
        
        return redirect()->back()->with('msg', 'The country '.$country->name.' was '.$action);
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
        $country = Country::find($id);
        return view('country.edit', ['country' => $country]);
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
            'name' => 'required|unique:countries'
        ]);
        
        $country = Country::find($id);
        $country->name = $request->input('name');
        $country->territory = $request->input('territory');
        $country->save();
        
        return redirect()->route('countries.index')->with('msg', 'Country '.$request->name.' was updated');
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
