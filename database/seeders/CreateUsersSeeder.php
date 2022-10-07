<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => 'mock1',
                'email' => 'mock1@eamil.com',
                'password' => Hash::make('123456')

            ],
            [
                'name' => 'mock2',
                'email' => 'mock2@eamil.com',
                'password' => Hash::make('123456')
            ]

        ];
        foreach($users as $key => $value){
            User::create($value);
        }
    }
}
