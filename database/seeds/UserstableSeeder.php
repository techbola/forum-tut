<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        App\User::create([

        	'name' => 'admin',
        	'password' => bcrypt('admin'),
        	'email' => 'admin@social.test',
        	'admin' => 1,
        	'avatar' => asset('avatars/avatar.png')

        ]);

        App\User::create([

            'name' => 'Emily',
            'password' => bcrypt('password'),
            'email' => 'emily@social.test',
            'avatar' => asset('avatars/avatar.png')

        ]);

    }
}
