<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($user = User::where('name', 'admin')->first()) {
            $user->delete();
        } else {
            User::create([
                'name'  => 'admin', 
                'phone'  => '0000', 
                'username'   => 'admin', 
                'position'   => 'admin', 
                'password'   => 'admin', 
                'status'     => 'admin',
                'rate'       => '0',
                'is_loggedin' => '0',
            ]);        
        }
    }
}
