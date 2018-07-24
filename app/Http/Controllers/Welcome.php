<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class Welcome extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function employeeLogin(Request $request) 
    {
        if(Auth::attempt(['username'=> $request->username, 'password'=> $request->password])) {
            return $this->checkStatus();
        }
        return redirect('/')->withErrors(['login-Error' => 'These credentials do not match our records.']); 
    }

    private function checkStatus() 
    {
        if (Auth::user()->status != 'admin') {
            return redirect('/'); 
        }
        Auth::logout();
        return redirect('/')->withErrors(['login-Error' => 'Only employees can login here.']); 
    }

}
