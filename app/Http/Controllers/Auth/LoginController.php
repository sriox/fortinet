<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Socialite;
use Google_Client;
use Google_Service_People;

use Auth;
use App\User;
use App\SocialProvider;

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
    
    /*public function googleLogin()
    {
        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email', Google_Service_People::CONTACTS_READONLY])
            ->redirect();
    }*/
    
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    /*public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        
        // OAuth Two Providers
        $token = $user->token;
        $refreshToken = $user->refreshToken; // not always provided
        $expiresIn = $user->expiresIn;

        // OAuth One Providers
        $token = $user->token;
        $tokenSecret = $user->tokenSecret;

        // $user->token;
    }*/
    
    /*public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('google')->stateless()->user();

        // Set token for the Google API PHP Client
        $google_client_token = [
            'access_token' => $user->token,
            'refresh_token' => $user->refreshToken,
            'expires_in' => $user->expiresIn
        ];

        $client = new Google_Client();
        $client->setApplicationName("set.fortinet.com");
        $client->setDeveloperKey(env('GOOGLE_SERVER_KEY'));
        $client->setAccessToken(json_encode($google_client_token));

        $service = new Google_Service_People($client);

        $optParams = array('requestMask.includeField' => 'person.phone_numbers,person.names,person.email_addresses');
        $results = $service->people_connections->listPeopleConnections('people/me',$optParams);

        dd($results);
        
    }*/
    public function handleProviderCallback()
    {
        try{
            $socialUser = Socialite::driver('google')->stateless()->user();
        }catch(Exception $e){
            echo $e;
        }
        
        $authenticatedUser = User::where('email', '=', $socialUser->email)->first();
        
        if($authenticatedUser){
            $authenticatedUser->socialProviders()->create([
                'user_id' => $authenticatedUser->id,
                'provider_id' => $socialUser->id,
                'provider' => 'google'
            ]);
            Auth::loginUsingId($authenticatedUser->id);
            session(['avatar' => $socialUser->avatar]);
            return redirect()->route('home');
        }else{
            return redirect('/');
        }
        
    }
    
    
}
