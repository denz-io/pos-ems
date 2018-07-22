<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ User, Logs };
use Auth;
use Carbon\Carbon;


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
           $this->isUsernameSet($request);
       }
       return redirect('/home')->withErrors(['createError' => 'Employee was not created! Username already exist!']);
    }

    private function isUsernameSet($request)
    {
       $id = User::create($request->all())->toArray()['id']; 
       $this->isProfilePicSet($request, $id);
       return redirect('/home');
    }

    public function deleteUser($id) {
        User::find($id)->delete();
        return redirect('/home');
    }

    public function updateUser(Request $request) {

        $user = User::find($request->id);
        $this->checkUpdate($request, $user);
        $this->isProfilePicSet($request, $request->id);
        return redirect('/home');
    }

    private function checkUpdate($request, $user) 
    {
        if (!isset($request->password)) {
            $user->update($request->except(['password']));
        } else {
            $user->update($request->all());
        }
    }

    private function isProfilePicSet($request, $id)
    {
        if (isset($request->image)) {
           $this->uploadProfilePic($request, $id);
        }
    }

    private function uploadProfilePic($request, $id)
    {
        $image = $request->file('image');
        $image_name = $id . '_item.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/profile_pics'), $image_name);
        User::find($id)->update(['profile' => $image_name]);
    }

    private function ValidateUser($request) {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rate' => 'required|integer',
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'position' => 'required|string|max:100',
        ]);
    }

    public function attendance($id) 
    {
        $user = User::find($id);
        $this->logStatus($user);
        $user->update([ 'is_loggedin' => $user->is_loggedin ? 0 : 1 ]);
        return redirect('/home-employee');
    }

    private function logStatus($user)
    {
        $user->is_loggedin ?  $this->punchout($user->id) : $this->punchin($user->id);
    }

    private function punchout($id)
    {
        foreach(Logs::where(['user_id' => $id,'time_out' => null])->get() as $log) {
            $log->time_out = Carbon::now();
            $log->save();
        }
    }

    private function punchin($id)
    {
        Logs::create([
            'user_id' => $id, 
            'time_in' => Carbon::now(), 
        ]);
    }
}
