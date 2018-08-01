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
            return redirect()->back()->withErrors(['success' => 'Payroll has been created.']);
        }
        return redirect()->back()->withErrors(['error' => 'There are no current logs for this account.']);
    }

    public function showStubs($id) 
    {
        $pay  = Pay::find($id);
        return view('payroll_stub', ['employee' => User::find($pay->user_id),'pay_detail' => $pay, 'logs' => Logs::where('paystub_id', $id)->get()]);
    }

    public function update(Request $request) 
    {
        if ( Carbon::parse($request->time_in) <= Carbon::parse($request->time_out)) {
            $this->validateDateFormat($request);
            Logs::find($request->id)->update(['time_in' => Carbon::parse($request->time_in), 'time_out' => Carbon::parse($request->time_out)]);
            return redirect()->back()->withErrors(['success' => 'Log has been updated.']);
        }
        return redirect()->back()->withErrors(['error' => 'Invalid log update.']);
    }

    public function validateDateFormat($request) {
        $this->validate($request, [
            'time_in' => 'required|date',
            'time_out' => 'required|date',
        ]);
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
