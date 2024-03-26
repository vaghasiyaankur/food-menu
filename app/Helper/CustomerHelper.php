<?php

namespace App\Helper;

use App\Models\Customer;

/**
 * Helper class for handling customers.
 */
class CustomerHelper
{
    /**
     * Get a customer by ID.
     *
     * @param int|null $id The ID of the customer to retrieve
     * @return Customer|null The retrieved customer or null if not found
     */
    public static function getCustomer($id = null)
    {
        return Customer::where('id', $id)
                        ->first();
    }

    /**
     * Create a new customer.
     *
     * @param array $data The data for creating the customer
     * @return Customer|null The created customer or null if creation failed
     */
    public static function createCustomer(array $data)
    {
        $customer = new Customer();
        $customer->name = $data['customer_name'] ?? null;
        $customer->number = $data['customer_number'] ?? null;
        $customer->agree_condition = $data['agree_condition'] ?? null;
        $customer->restaurant_id = $data['restaurant_id'] ?? null;
        $customer->device_token = $data['device_token'] ?? null;
        
        if ($customer->save())
            return $customer;
        else
            return null; 
    }
}
