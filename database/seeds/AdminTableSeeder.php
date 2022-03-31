<?php

use App\Model\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



    Admin::create([
        'firstname' => 'Super',
        'lastname' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' =>Hash::make('12345678'),
    ]);


    }
}
