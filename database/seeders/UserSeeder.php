<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $users = [

            [
                'name' => 'Manager 1',
                'email' => 'manager1@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile_number' => $this->generateIndianMobileNumber($faker),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 1234,
                'mobile_number' => 9632587413,
                'role' => 'manager',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Manager 2',
                'email' => 'manager2@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile_number' => $this->generateIndianMobileNumber($faker),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 5678,
                'role' => 'manager',
                'mobile_number' => 9632587414,
                'restaurant_id' => 1
                ],
            [
                'name' => 'Manager 3',
                'email' => 'manager3@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile_number' => $this->generateIndianMobileNumber($faker),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'mobile_number' => 9632587415,
                'lock_pin' => 9101,
                'role' => 'manager',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Manager 4',
                'email' => 'manager4@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile_number' => $this->generateIndianMobileNumber($faker),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'mobile_number' => 9632587416,
                'lock_pin' => 1011,
                'role' => 'manager',
                'restaurant_id' => 2
            ],
            [
                'name' => 'Manager 5',
                'email' => 'manager5@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile_number' => $this->generateIndianMobileNumber($faker),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'mobile_number' => 9632587417,
                'lock_pin' => 1112,
                'role' => 'manager',
                'restaurant_id' => 2
            ],

            [
                'name' => 'Waiter 1',
                'email' => 'waiter1@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile_number' => $this->generateIndianMobileNumber($faker),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'mobile_number' => 9632587418,
                'lock_pin' => 1234,
                'role' => 'waiter',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Waiter 2',
                'email' => 'waiter2@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile_number' => $this->generateIndianMobileNumber($faker),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 5678,
                'mobile_number' => 9632587412,
                'role' => 'waiter',
                'restaurant_id' => 1
                ],
            [
                'name' => 'Waiter 3',
                'email' => 'waiter3@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile_number' => $this->generateIndianMobileNumber($faker),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 9101,
                'mobile_number' => 9874563321,
                'role' => 'waiter',
                'restaurant_id' => 1
            ],
            [
                'name' => 'Waiter 4',
                'email' => 'waiter4@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile_number' => $this->generateIndianMobileNumber($faker),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 1011,
                'mobile_number' => 7412589632,
                'role' => 'waiter',
                'restaurant_id' => 2
            ],
            [
                'name' => 'Waiter 5',
                'email' => 'waiter5@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile_number' => $this->generateIndianMobileNumber($faker),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 1112,
                'mobile_number' => 9514786325,
                'role' => 'waiter',
                'restaurant_id' => 2
            ],
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('123456789'),
                'mobile_number' => $this->generateIndianMobileNumber($faker),
                'email_verified_at' => \Carbon\Carbon::now(),
                'remember_token' => Str::random(10),
                'lock_pin' => 1234,
                'mobile_number' => 9632587413,
                'role' => 'super_admin',
                'restaurant_id' => 1
            ],
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
    
    /**
     * Generate a fake Indian mobile number.
     *
     * @param \Faker\Generator $faker
     * @return string
     */
    private function generateIndianMobileNumber($faker)
    {
        // Indian mobile number format: 7XXXXXXXXX, 8XXXXXXXXX, or 9XXXXXXXXX
        $prefix = $faker->randomElement(['7', '8', '9']);
        $number = $faker->numerify('#########'); // 9 digits
        return $prefix . $number;
    }
}
