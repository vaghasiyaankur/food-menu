<?php

namespace App\Helper;

use App\Models\Customer;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

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


    /**
     * Get a restaurant Id .
     *
     * @param array $restaurantId The data for if pass id
     * @return RestaurantId 
     */
    public static function getRestaurantId($restaurantId = null){
        if(!$restaurantId){
            if(Auth::user()){
                $restaurantId = Auth::user()->restaurant_id;
            }else{
                $restaurantId = Restaurant::first()->id;
            }
        }
        return $restaurantId;
    }
}
