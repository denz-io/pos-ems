<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;
use App\Models\User;

class Settings extends Controller
{
    public function index()   
    {
        return view('settings');
    }

    public function store(Request $request)
    {
        $this->validateForm($request);
        if ($request = $this->checkPassword($request)) {
            User::find(Auth::user()->id)->update($request->all());
            $this->isProfilePicSet($request);
            return redirect('/settings')->withErrors(['success' => 'Profile Updated.']);
        }
        return redirect('/settings')->withErrors(['error' => 'Password is incorrect!']);
    }

    private function checkPassword($request)
    {
        if (Hash::check($request->password, Auth::user()->password)) {
            $request['password'] = $request->new_password ?? $request->password; 
            return $request;
        }
    }

    private function isProfilePicSet($request)
    {
        if (isset($request->image)) {
           $this->uploadProfilePic($request);
        }
    }

    private function uploadProfilePic($request)
    {
        $image = $request->file('image');
        $image_name = Auth::user()->id . '_item.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/profile_pics'), $image_name);
        User::find(Auth::user()->id)->update(['profile' => $image_name]);
    }

    private function validateForm($request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'password' => 'required|string|max:100',
        ]);
    }
}
