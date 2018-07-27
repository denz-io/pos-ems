<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ User, Logs , Payroll};
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
            $logs = Logs::where('user_id', Auth::user()->id)->where('paystub_id', null)->get();
            return view('home-employee', ['stubs' => Payroll::where('user_id', Auth::user()->id)->get(), 'logs' => $logs, 'pay_detail' => $this->getCurrentPayout($logs)]);
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

    private function getCurrentPayout($logs) 
    {
        if (count($logs)) {
            $time = [];
            foreach($logs as $log) {
                if ($log->time_out) {
                    array_push($time, Carbon::parse(Carbon::parse($log->time_out))->diffInMinutes(Carbon::parse($log->time_in)));
                }
            }
            return $this->calculatePay($time,$logs[0]->user_id);
        }
    }

    private function calculatePay($time,$id)
    {
        $total_time = 0;
        $pay_detail = [];
        foreach($time as $min) {
            $total_time = $min + $total_time;
        }
        array_push($pay_detail,round($total_time * (User::find($id)->rate / 60), 2), $total_time, $id); 
        return $pay_detail;
    }
}
