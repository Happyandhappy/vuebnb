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
        //
        
        User::create([
            
            
            'name' => 'Babakar',
             'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'saved' => [1,2,3]
        ]);
    }
}
