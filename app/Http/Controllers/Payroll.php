<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ User, Logs, Payroll as Pay };
use Carbon\Carbon;

class Payroll extends Controller
{
    public function show($id) 
    {
        $logs = Logs::where('user_id', $id)->where('paystub_id', null)->get();
        return view('payroll', ['stubs' => Pay::where('user_id', $id)->get(), 'employee' => User::find($id),'logs' => $logs , 'pay_detail' => $this->getCurrentPayout($logs) ]);
    }

    public function store(Request $request) 
    {
        $logs = Logs::where('user_id', $request->user_id)->where('paystub_id', null)->get();
        if (count($logs)) {
            $request['start_date'] = $logs[0]->created_at;
            $request['end_date'] = $logs[count($logs) - 1]->created_at;
            $payroll = Pay::create($request->all());
            $this->updateLogs($logs, $payroll->id);
            return redirect()->back();
        }
        return redirect()->back()->withErrors(['error' => 'There are no current logs for this account.']);
    }

    public function showStubs($id) 
    {
        $user_id  = Pay::find($id)->first()->user_id;
        return view('payroll_stub', ['employee' => User::find($user_id),'pay_detail' => Pay::find($id), 'logs' => Logs::where('paystub_id', $id)->get()]);
    }

    public function update(Request $request) 
    {
        Logs::find($request->id)->update(['time_in' => Carbon::parse($request->time_in), 'time_out' => Carbon::parse($request->time_out)]);
        return redirect()->back();
    }

    public function deleteLog($id) 
    {
        Logs::find($id)->delete();
        return $id;
    }

    public function deletePayroll($id) 
    {
        Pay::find($id)->delete();
        return $id;
    }

    private function updateLogs($logs, $pay_id) 
    {
        foreach ($logs as $log) {
            $log->time_out  = $log->time_out ?  $log->time_out : Carbon::now();
            $log->paystub_id = $pay_id; 
            $log->save();
        }
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
