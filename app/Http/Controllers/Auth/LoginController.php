<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Google_Client;
use Google_Service_People;
use App\Http\Controllers\Controller;

use File; 


use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        session()->put('state', request()->input('state'));
        $user = Socialite::driver('facebook')->user();

        $findUser = User::where('email',$user->getEmail())->first();
        if ($findUser) {
            $fileContents = file_get_contents($user->avatar);
            \File::delete(public_path('/images/avatar/'.$findUser->avatar));

            File::put(public_path() . '/images/avatar/' . $user->id . ".jpg", $fileContents);
            $imagee = $user->id.'.jpg';

            $findUser->email = $user->email;
            $findUser->name = $user->name;
            $findUser->avatar = $imagee;
            $findUser->save();
            Auth::login($findUser);
        }else{
            $fileContents = file_get_contents($user->getAvatar());
            File::put(public_path() . '/images/avatar/' . $user->getId() . ".jpg", $fileContents);
            $imagee = $user->getId().'.jpg';

            $newUser = new User;
            $newUser->email = $user->getEmail();
            $newUser->name = $user->getName();
            $newUser->avatar = $imagee;
            $newUser->password = bcrypt('b7e543f6a2501165c8ca7194c3e4e808');
            $newUser->save();
            Auth::login($newUser);
        }
        return redirect('home');
    }

    public function googleHedirectToProvider()
        {
            return Socialite::driver('google')->redirect();
        }
        
    public function googleHandleProviderCallback()
        {
            session()->put('state', request()->input('state'));
            $user = Socialite::driver('google')->user();
            $findUser = User::where('email',$user->email)->first();
            if ($findUser) {
                $fileContents = file_get_contents($user->avatar);
                \File::delete(public_path('/images/avatar/'.$findUser->avatar));

                File::put(public_path() . '/images/avatar/' . $user->id . ".jpg", $fileContents);
                $imagee = $user->id.'.jpg';

                $findUser->email = $user->email;
                $findUser->name = $user->name;
                $findUser->avatar = $imagee;
                $findUser->save();
                Auth::login($findUser);
            }else{
                $fileContents = file_get_contents($user->avatar);
                File::put(public_path() . '/images/avatar/' . $user->id . ".jpg", $fileContents);
                $imagee = $user->id.'.jpg';
                $newUser = new User;
                $newUser->email = $user->email;
                $newUser->name = $user->name;
                $newUser->avatar = $imagee;
                $newUser->password = bcrypt('b7e543f6a2501165c8ca7194c3e4e808');
                $newUser->save();
                Auth::login($newUser);
            }
            return redirect('home');
        }

    public function twitterHedirectToProvider()
        {
            return Socialite::driver('twitter')->redirect();
        }
       
    public function twitterHandleProviderCallback()
        {
            $user = Socialite::driver('twitter')->user();
            $findUser = User::where('email',$user->email)->first();
            if ($findUser) {
                $fileContents = file_get_contents($user->avatar);
                \File::delete(public_path('/images/avatar/'.$findUser->avatar));

                File::put(public_path() . '/images/avatar/' . $user->id . ".jpg", $fileContents);
                $imagee = $user->id.'.jpg';

                $findUser->email = $user->email;
                $findUser->name = $user->name;
                $findUser->avatar = $imagee;
                $findUser->save();
                Auth::login($findUser);
            }else{

                $fileContents = file_get_contents($user->avatar);

                File::put(public_path() . '/images/avatar/' . $user->id . ".jpg", $fileContents);
                $imagee = $user->id.'.jpg';

                $newUser = new User;
                $newUser->email = $user->email;
                $newUser->name = $user->name;
                $newUser->avatar = $imagee;
                $newUser->password = bcrypt('b7e543f6a2501165c8ca7194c3e4e808');
                $newUser->save();
                Auth::login($newUser);
            }
            return redirect('home');
        }
}
