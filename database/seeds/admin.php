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
        User::create([
            'name'  => 'admin', 
            'phone'  => '0000', 
            'username'   => 'admin', 
            'position'   => 'admin', 
            'password'   => 'admin', 
            'status'     => 'superadmin',
            'rate'       => '0',
            'is_loggedin' => '0',
        ]);        
    }
}
