<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [

            [
                'name' => 'Manager 1',
                'email' => 'manager1@gmail.com',
                'password' => Hash::make('123456789'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 1234,
                'role' => 'manager',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Manager 2',
                'email' => 'manager2@gmail.com',
                'password' => Hash::make('123456789'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 5678,
                'role' => 'manager',
                'restaurant_id' => 1
                ],
            [
                'name' => 'Manager 3',
                'email' => 'manager3@gmail.com',
                'password' => Hash::make('123456789'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 9101,
                'role' => 'manager',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Manager 4',
                'email' => 'manager4@gmail.com',
                'password' => Hash::make('123456789'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 1011,
                'role' => 'manager',
                'restaurant_id' => 2
            ],
            [
                'name' => 'Manager 5',
                'email' => 'manager5@gmail.com',
                'password' => Hash::make('123456789'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 1112,
                'role' => 'manager',
                'restaurant_id' => 2
            ],

            [
                'name' => 'Waiter 1',
                'email' => 'waiter1@gmail.com',
                'password' => Hash::make('123456789'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 1234,
                'role' => 'waiter',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Waiter 2',
                'email' => 'waiter2@gmail.com',
                'password' => Hash::make('123456789'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 5678,
                'role' => 'waiter',
                'restaurant_id' => 1
                ],
            [
                'name' => 'Waiter 3',
                'email' => 'waiter3@gmail.com',
                'password' => Hash::make('123456789'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 9101,
                'role' => 'waiter',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Waiter 4',
                'email' => 'waiter4@gmail.com',
                'password' => Hash::make('123456789'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 1011,
                'role' => 'waiter',
                'restaurant_id' => 2
            ],
            [
                'name' => 'Waiter 5',
                'email' => 'waiter5@gmail.com',
                'password' => Hash::make('123456789'),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 1112,
                'role' => 'waiter',
                'restaurant_id' => 2
            ]
        ];


        foreach($users as $user){
            User::insert($user);
        }



        // User::create([
        //     'name' => 'Manager 1',
        //     'email' => 'manager1@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => \Carbon\Carbon::now(),
        //     'remember_token' => Str::random(10),
        //     'lock_pin' => 1234,
        //     'role' => 'manager',
        //     'restaurant_id' => 1
        // ]);

        // User::create([
        //     'name' => 'Manager 2',
        //     'email' => 'manager2@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => \Carbon\Carbon::now(),
        //     'remember_token' => Str::random(10),
        //     'lock_pin' => 5678,
        //     'role' => 'manager',
        //     'restaurant_id' => 1
        // ]);

        // User::create([
        //     'name' => 'Manager 3',
        //     'email' => 'manager3@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => \Carbon\Carbon::now(),
        //     'remember_token' => Str::random(10),
        //     'lock_pin' => 9101,
        //     'role' => 'manager',
        //     'restaurant_id' => 1
        // ]);

        // User::create([
        //     'name' => 'Manager 4',
        //     'email' => 'manager4@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => \Carbon\Carbon::now(),
        //     'remember_token' => Str::random(10),
        //     'lock_pin' => 1011,
        //     'role' => 'manager',
        //     'restaurant_id' => 2
        // ]);

        // User::create([
        //     'name' => 'Manager 5',
        //     'email' => 'manager5@gmail.com',
        //     'password' => Hash::make('123456789'),
        //     'email_verified_at' => \Carbon\Carbon::now(),
        //     'remember_token' => Str::random(10),
        //     'lock_pin' => 1112,
        //     'role' => 'manager',
        //     'restaurant_id' => 2
        // ]);
    }
}
