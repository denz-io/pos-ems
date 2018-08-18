<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class Inventory extends Controller
{
    public function index()
    {
        return view('inventory', ['items' => Item::orderBy('name')->get()]);
    }

    public function store(Request $request) 
    {
        $this->ValidateItems($request);
        $id = Item::create($request->all())->toArray()['id'];
        isset($request->image) ? $this->uploadProfilePic($request, $id) : null;
        return redirect('/inventory')->withErrors(['success' => 'Item added to inventory.']);
    }

    public function update(Request $request) 
    {
        $this->ValidateItems($request);
        Item::find($request->id)->update($request->all());
        isset($request->image) ? $this->uploadProfilePic($request, $request->id) : null;
        return redirect('/inventory')->withErrors(['success'=> 'Item details updated.']);
    }

    public function show($id) 
    {
        Item::find($id)->delete();
        return redirect('/inventory')->withErrors(['success' => 'Item deleted.']);
    }

    public function uploadProfilePic($request, $id)
    {
        $image = $request->file('image');
        $image_name = $id . '_item.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/item_pics'), $image_name);
        Item::find($id)->update(['image' => $image_name]);
    }

    public function ValidateItems($request) {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'original_price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'retail_price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'sold' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'name' => 'required|max:100',
            'description' => 'required',
        ]);
    }
}
