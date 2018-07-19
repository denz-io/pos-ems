<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class Home extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', ['users' => User::all()]);
    }

    public function createUser(Request $request) 
    {
       $this->ValidateUser($request);
       if (!User::where('username', $request->username)->first()) {
           $id = User::create($request->all())->toArray()['id']; 
           if (isset($request->image)) {
               $this->uploadProfilePic($request, $id);
           }
           return redirect('/home');
       }
       return redirect('/home')->withErrors(['createError' => 'Employee was not created! Username already exist!']);
    }

    public function deleteUser($id) {
        User::find($id)->delete();
        return redirect('/home');
    }

    public function updateUser(Request $request) {

        $user = User::find($request->id);

        if (!isset($request->password)) {
            $user->update($request->except(['password']));
        } else {
            $user->update($request->all());
        }

        if (isset($request->image)) {
           $this->uploadProfilePic($request, $request->id);
        }

        return redirect('/home');
    }

    public function uploadProfilePic($request, $id)
    {
        $image = $request->file('image');
        $image_name = $id . '_item.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/profile_pics'), $image_name);
        User::find($id)->update(['profile' => $image_name]);
    }

    public function ValidateUser($request) {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rate' => 'required|integer',
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'position' => 'required|string|max:100',
        ]);
    }

    public function showPayroll($id) {
        dd($id);
    }

    public function showLogs($id) {
        dd($id);
    }
}
