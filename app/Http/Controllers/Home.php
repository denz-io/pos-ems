<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class Home extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', ['users' => User::all()]);
    }

    public function createUser(Request $request) 
    {
       $this->ValidateUser($request);
       User::create($request->all()); 
       return redirect('/home');
    }

    public function ValidateUser($request) {
        $this->validate($request, [
            'rate' => 'required|integer',
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'position' => 'required|string|max:100',
        ]);
    }
}
