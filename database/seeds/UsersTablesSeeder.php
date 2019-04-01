<?php

use Illuminate\Database\Seeder;
use App\user;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        user::create([
               'name'	=>'bobin',
               'email'	=>'bobin@rexav.in',
               'password'	=>Hash::make('password'),
               'remember_token'	=>str_random(10)
        ]);
    }
}
