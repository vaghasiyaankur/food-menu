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
            ['id' => 1,'name' => 'demo_customer_1', 'number' => '9876543211'],
            ['id' => 2,'name' => 'demo_customer_2', 'number' => '9876543212'],
            ['id' => 3,'name' => 'demo_customer_3', 'number' => '9876543213'],
            ['id' => 4,'name' => 'demo_customer_4', 'number' => '9876543214'],
            ['id' => 5,'name' => 'demo_customer_5', 'number' => '9876543215']
        ];

        $user_ids = [1,2,3,4,5];

        foreach ($user_ids as $key => $user_id) {
            foreach ($customers as $customer) {
                $cut = new Customer();
                $cut->name = $customer['name'];
                $cut->number = $customer['number'];
                $cut->user_id = $user_id;
                $cut->save();
            }
        }
    }
}
