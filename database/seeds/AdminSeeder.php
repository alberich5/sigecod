<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Antonio',
            'email' => 'antonio958@hotmail.com',
            'password' => bcrypt(123456),
            'rol' => 'admin',
            'remember_token' => bcrypt(date('YmdHms'))
        ]);
        User::create([
            'name' => 'Pepe',
            'email' => 'pepe@pepe.com',
            'password' => bcrypt(123456),
            'rol' => 'user',
            'remember_token' => bcrypt(date('YmdHms'))
        ]);
    }
}
