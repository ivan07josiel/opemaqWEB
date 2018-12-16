<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Ivan Josiel',
            'email'     => 'ivan07josiel@gmail.com',
            'password'  => bcrypt('123456')
        ]);

        $this->command->info('User Ivan07josiel@gmail.com crated');
        
        User::create([
            'name'      => 'Igor Melo',
            'email'     => 'igormelo@gmail.com',
            'password'  => bcrypt('123456')
        ]);

        $this->command->info('User igormelo@gmail.com crated');


    }
}
