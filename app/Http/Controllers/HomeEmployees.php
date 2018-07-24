<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ User, Logs };
use Carbon\Carbon;
use Auth;

class HomeEmployees extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->status != 'admin') {
            return view('home-employee', ['logs' => Logs::where('user_id', Auth::user()->id)->where('paystub_id', null)->get()]);
        }
        return redirect()->back()->withErrors([ 'error' => 'Access-denied.']);
    }

    public function attendance() 
    {
        if (Auth::user()->is_loggedin) {
            $this->punchout();
        } else {
            $this->punchin();
        }
        User::find(Auth::user()->id)->update([ 'is_loggedin' => Auth::user()->is_loggedin ? 0 : 1 ]);
        return redirect('/home-employee');
    }

    private function punchout()
    {
        foreach(Logs::where(['user_id' => Auth::user()->id,'time_out' => null])->get() as $log) {
            $log->time_out = Carbon::now();
            $log->save();
        }
    }

    private function punchin()
    {
        Logs::create([
            'user_id' => Auth::user()->id, 
            'time_in' => Carbon::now(), 
        ]);
    }
}
