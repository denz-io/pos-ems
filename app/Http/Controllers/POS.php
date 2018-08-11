<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Invoice, Item};

class POS extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('point_of_sales', ['items' => Item::get()]);
    }

    public function getItem($id) 
    {
        if ($found =  Item::where('id', $id)->where('stock', '>',0)->first()) {
            return $found->toArray();
        }
        return null; 
    }

    public function store(Request $request) 
    {
        Invoice::create($request->all());
        $this->updateStocks(json_decode($request->items));
        return redirect('/pos')->withErrors(['success' => 'Transaction completed.']);
    }

    private function updateStocks($items) 
    {
        foreach($items as $item) {
            $found_item = Item::find($item->id); 
            $found_item->update([ 'stock' => $found_item->stock - $item->qty, 'sold' =>  $found_item->sold + $item->qty ]);
        }
    }
}
