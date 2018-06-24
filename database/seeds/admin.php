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
            'first_name' => 'test', 
            'last_name'  => 'test', 
            'username'   => 'admin', 
            'password'   => 'admin', 
            'status'     => 'superadmin',
            'rate'       => '0'
        ]);        
    }
}
