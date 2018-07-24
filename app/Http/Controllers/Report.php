<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Invoice, Report as Reports};
use Carbon\Carbon;
use Auth;


class Report extends Controller
{
    public function index() 
    {
        return view('report', ['reports' => Reports::get()]);
    }

    public function store(Request $request) 
    {
        if ($new_report = $this->setReportData($this->getFilteredInvoices($request), $request)) {
            Reports::create($new_report);
            return redirect('/report');
        }
        return redirect()->back()->withErrors([ 'error' => 'There are no invoices recorded between these dates.']);;
    }

    public function show($id)
    {
        $report = Reports::find($id);
        if ($report) {
            return view('invoices_by_report', ['report' => $report,'invoices' => $this->getFilteredInvoices($report)]);
        }
        return redirect('/report')->withErrors([ 'error' => 'The report does not exist!']);
    }

    public function delete($id)
    {
        Reports::find($id)->delete();
        return redirect()->back();
    }

    private function getFilteredInvoices($request) 
    {
        $tolist = [];
        foreach(Invoice::get() as $key => $invoice) {
            if ($this->checkDates($invoice, $request)) {
                array_push($tolist, $invoice);
            }
        }
        return $tolist;
    }

    /**
     *filter invoices using dates
     */
    private function checkDates($invoice, $request) 
    {
        return (Carbon::parse($invoice->toArray()['created_at']) <= Carbon::parse($request->report_end) && Carbon::parse($invoice->toArray()['created_at']) >= Carbon::parse($request->report_start));

    }

    /**
     *filter invoices using dates
     */
    private function setReportData($data, $request) 
    {
        $sales = 0;
        $profit = 0;

        if (!count($data)) {
            return;
        }

        foreach ($data as $invoice) {
            $sales = $sales + $invoice->amount_due;
            $profit = $profit + $invoice->profit;
        }

        return [
            'report_start' => $request->report_start,
            'report_end'   => $request->report_end,
            'user_id'      => Auth::user()->id,
            'total_amount' => round($sales, 2),
            'total_earned' => round($profit,2)
        ];
    }
}
