<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            ['name' => 'Biren Raj Sura', 'number' => '9876543211'],
            ['name' => 'Kim Narayan', 'number' => '9876543212'],
            ['name' => 'Qabool Choudhry', 'number' => '9876543213'],
            ['name' => 'Nikita Bakshi', 'number' => '9876543214'],
            ['name' => 'Nidhi Rastogi', 'number' => '9876543215']
        ];

        $user_ids = [1,2];

        foreach ($user_ids as $key => $user_id) {
            foreach ($customers as $customer) {
                $cut = new Customer();
                $cut->name = $customer['name'];
                $cut->number = $customer['number'];
                $cut->restaurant_id = $user_id;
                $cut->save();
            }
        }
    }
}
