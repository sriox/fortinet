<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Department;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withTrashed()->with('profile')->get()->sortBy('name');
        $profiles = Profile::All();
        return view('users.index', ['users' => $users, 'profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = Profile::all()->sortBy('name');
        $departments = Department::all()->sortBy('name');
        return view('users.create', [
            'profiles' => $profiles,
            'departments' => $departments
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'profile' => 'required',
            'department' => 'required'
        ]);
        
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('email')),
            'profile_id' => $request->input('profile'),
            'department_id' => $request->input('department')
        ]);
        
        return redirect()->route('users.index')->with('msg', 'User Created');
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
        $user = User::find($id);
        $profiles = Profile::all();
        $departments = Department::all()->sortBy('name');
        $adminProfile = $profiles->where('key', '=', 'ADMIN')->first();
        
        
        
        if($user->profile->key == $adminProfile->key)   {
            $adminsCount = User::where('profile_id', '=', $adminProfile->id)->count();
            $profileChangeable = $adminsCount > 1;
        }else{
            $profileChangeable = true;
        }
        
        return view('users.edit', [
            'user' => $user, 
            'profiles' => $profiles, 
            'profileChangeable' => $profileChangeable,
            'departments' => $departments
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
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'profile' => 'required',
            'department' => 'required'
        ]);
        
        $profile = Profile::find($request->input('profile'));
        $department = Department::find($request->input('department'));
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        $profile->users()->save($user);
        $department->users()->save($user);
        
        return redirect()->route('users.index')->with('msg', 'User '.$request->name.' was updated');
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
    public function delete($id)
    {
        $user = User::withTrashed()->find($id);
        if($user->trashed()){
            $user->restore();
            $action = 'activated';
        }else{
            $user->delete();
            $action = 'inactivated';
        }
        
        return redirect()->back()->with('msg', 'The activity type '.$user->name.' was '.$action);
    }
}
