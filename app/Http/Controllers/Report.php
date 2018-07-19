<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Invoice, Report as Reports};
use Carbon\Carbon;


class Report extends Controller
{
    public function index() 
    {
        return view('report', ['reports' => Reports::get()]);
    }

    public function store(Request $request) 
    {
        $this->getAmount($this->getFilteredInvoices($request));
    }

    private function getFilteredInvoices($request) 
    {
        $i = 0;
        foreach(Invoice::get() as $key => $invoice) {
            if ($this->checkDates($invoice, $request)) {
                $i++;
                $tolist[$i] = $invoice; 
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
    private function getAmount($data) 
    {
        foreach ($data as $invoice) {
            dd($invoice->toArray());
        }
    }
}
