<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Model\Setting;


class ProfileController extends Controller
{
    
    public function get()
    {
        $user = User::find(Auth::user()->id);

        return view('admin.profile',compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        
        $this->validate(request(),[
            'name'=>'required|max:255|string',
            'email'=>'required|max:255|email|string||unique:users,email,'.$user->id,
        ]);

        if (request('name')) {
            $user->name = request('name');
        }

        if (request('email')) {
            $user->email = request('email');
        }

        if (request('mobile')) {
            $user->mobile = request('mobile');
        }

        if (request('avatar')) {
            \File::delete(public_path('/images/avatar/'.$user->avatar));
            $image = request('avatar');
            $imagee = 'avatar' .time() . '.' .$image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());   
            $image_resize->resize(150, 150);
            $image_resize->save(public_path('images/avatar/' .$imagee));

            $user->avatar = $imagee;
        }

        if (request('country')) {
            $user->country = request('country');
        }

        if (request('gender')) {
            $user->gender = request('gender');
        }

        if (request('job')) {
            $user->job = request('job');
        }

        if (request('address')) {
            $user->address = request('address');
        }

        if (request('birthday')) {
            $user->birthday = request('birthday');
        }

        if (request('password')) {
            $user->password = Hash::make(request('password'));
        }
        
        
        $user->save();

        return redirect('/profile')->with('success', trans('lang.saveb'));
    }

    function getsettings()
    {
        $settings = Setting::find(1);
        return view('admin.settings',compact('settings'));
    }

    function settings(Request $request)
    {
       
        $settings = Setting::find(1);

        if (request('logo')) {
            $logoe = time() . '.' .request('logo')->getClientOriginalExtension();
            request('logo')->move(public_path('images/'),$logoe);
            $settings->logo = $logoe;
        }

        // dd(meta());

        if (request('metaTitle')) {
            $settings->metaTitle = request('metaTitle');
        }

        if (request('metaKeywords')) {
            $settings->metaKeywords = request('metaKeywords');
        }

        if (request('metaDescription')) {
            $settings->metaDescription = request('metaDescription');
        }

        if (request('mailTo')) {
            $settings->mailTo = request('mailTo');
        }

        if (request('mailBcc')) {
            $settings->mailBcc = request('mailBcc');
        }
        
        $settings->save();

        return redirect('/admin/settings')->with('success', trans('lang.saveb'));
    }
}
