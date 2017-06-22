<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        
        $authenticatedUser = User::where('email', '=', $user->email)->first();
        
        if($authenticatedUser){
            Auth::loginUsingId($authenticatedUser->id);
            session(['avatar' => $user->avatar]);
            return redirect()->route('home');
        }else{
            return redirect('/');
        }
        
    }
}
