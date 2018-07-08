<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Logs;
use Carbon\Carbon;
use Auth;

class HomeEmployees extends Controller
{
    public function employeeLogin(Request $request) 
    {
        if (Auth::attempt(['username'=> $request->username, 'password'=> $request->password])) {
            Logs::create([
                'user_id' => Auth::user()->id,
                'time_in' =>  Carbon::now()
            ]);  
            User::find(Auth::user()->id)->update([ 'is_loggedin' => 1 ]);
            return redirect('/home-employee'); 
        }
        return redirect('/')->withErrors(['login-Error' => 'These credentials do not match our records.']); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            return view('home-employee', ['logs' => Logs::where('user_id', Auth::user()->id)->get()]);
        }
        return redirect('/');
    }

}
