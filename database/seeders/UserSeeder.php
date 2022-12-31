<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Manager 1',
            'email' => 'manager1@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => \Carbon\Carbon::now(),
            'remember_token' => Str::random(10),
            'lock_pin' => 1234
        ]);

        User::create([
            'name' => 'Manager 2',
            'email' => 'manager2@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => \Carbon\Carbon::now(),
            'remember_token' => Str::random(10),
            'lock_pin' => 5678
        ]);

        User::create([
            'name' => 'Manager 3',
            'email' => 'manager3@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => \Carbon\Carbon::now(),
            'remember_token' => Str::random(10),
            'lock_pin' => 9101
        ]);

        User::create([
            'name' => 'Manager 4',
            'email' => 'manager4@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => \Carbon\Carbon::now(),
            'remember_token' => Str::random(10),
            'lock_pin' => 1011
        ]);

        User::create([
            'name' => 'Manager 5',
            'email' => 'manager5@gmail.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => \Carbon\Carbon::now(),
            'remember_token' => Str::random(10),
            'lock_pin' => 1112
        ]);
    }
}
