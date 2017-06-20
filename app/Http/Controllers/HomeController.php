<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $data = DB::select('SELECT u.name, CONVERT(SUM(a.time_used), signed) AS time_used
                            FROM activities a, users u
                            WHERE u.id = a.user_id
                            GROUP BY u.name');
        
        $technologies = DB::select('SELECT t.name, CONVERT(SUM(a.time_used), signed) AS time_used
                            FROM activities a, technologies t
                            WHERE t.id = a.technology_id
                            GROUP BY t.name');
        
        return view('home', ['data' => $data, 'technologies' => $technologies]);
    }
}
