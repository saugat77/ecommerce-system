<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
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
        $user = [
            ['name' => 'saugat',
            'email' => 'saugat@gmail.com',
            'password' => Hash::make('password'),
            'utype'=>'ADM']

        ];
        foreach($user as $user){
        \App\Models\User::firstOrCreate($user);

        }
    }
}
