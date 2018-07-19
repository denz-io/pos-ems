<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice as Invoices;

class Invoice extends Controller
{
    public function index() 
    {
        return view('invoices', ['invoices' => Invoices::get()]);
    }

    public function show($id) 
    {
        $invoice = Invoices::find($id);
        if ($invoice) {
            return view('view_invoices', ['invoice' => $invoice, 'items' => $this->getItems($invoice->items)]);
        }
        return back()->withErrors(['error' => 'Invoice does not exist!']);
    }

    private function getItems($items) 
    {
        if (strpos($items, ';')) {
            $items_array  = explode(';', $items);
            foreach($items_array as $key => $items) {
                $items_array[$key] = explode(',',$items);
            }
        } else {
            $items_array[0]  = explode(',', $items);
        }
        return $items_array;
    }
}
