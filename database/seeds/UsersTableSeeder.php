<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Pol Kharlo villa',
                'email' => 'flippinskip@gmail.com',
                'email_verified_at' => NULL,
                'admin' => 1,
                'password' => Hash::make('Seeker'),
                'remember_token' => NULL,
                'created_at' => date('Y-m-d', time()),
                'updated_at' => date('Y-m-d', time()),
            ),
        ));
        
        
    }
}