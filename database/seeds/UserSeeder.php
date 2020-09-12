<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = User::create(
            [
                'name' => 'Ahmed_Sayed',
                'email'=> 'AhmedSayed@gmail.com',
                'password'=>bcrypt('123456')
            ]
            );

        $user->attachRole('manager');




    }
}
