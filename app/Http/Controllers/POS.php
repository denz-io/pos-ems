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

    public function store(Request $request) 
    {
        $this->convertStringToArray($request->items);
        Invoice::create($request->all());
        return redirect('/pos');
    }

    private function convertStringToArray($items) 
    {
        if (strpos($items, ';')) {
            $items_array  = explode(';', $items);
            foreach($items_array as $key => $items) {
                $items_array[$key] = explode(',',$items);
            }
            $this->updateStocks($items_array);
        } else {
            $items_array  = explode(',', $items);
            $inventory = Item::find($items_array[0]); 
            $inventory->update([ 'stock' => $items_array[3], 'sold' => $inventory->sold + $items_array[4] ]); 
        }
    }

    private function updateStocks($items) 
    {
        foreach($items as $item) {
            $inventory = Item::find($item[0]); 
            $inventory->update([ 'stock' => $item[3], 'sold' =>  $inventory->sold + $item[4] ]);
        }
    }
}
