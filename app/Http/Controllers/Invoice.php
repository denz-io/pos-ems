<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Item ,Invoice as Invoices};

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
            return view('view_invoices', ['invoice' => $invoice, 'items' => $this->getItems(json_decode($invoice->items))]);
        }
        return back()->withErrors(['error' => 'Invoice does not exist!']);
    }

    public function delete($id)
    {
        Invoices::find($id)->delete();
        return redirect()->back()->withErrors(['success' => 'Invoice has been deleted!']);
    }

    public function getItems($items) 
    {
        foreach ($items as $key => $item) {
            $found_item = Item::find($item->id);
            $items[$key]->name = $found_item->name;
            $items[$key]->retail_price = $found_item->retail_price;
            $items[$key]->amount = $item->qty * $found_item->retail_price;
        }
        return $items;
    }

}
