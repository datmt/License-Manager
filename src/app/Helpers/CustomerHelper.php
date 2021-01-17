<?php


namespace App\Helpers;


use App\Models\Customer;

class CustomerHelper
{
    public static function create($name,$email, $address = '', $phone = '') {
        $customer = new Customer();
        $customer->name = $name;
        $customer->email = $email;
        $customer->address = $address;
        $customer->phone = $phone;
        $now = time();
        $customer->created_at = $now;
        $customer->updated_at = $now;

        $customer->save();
    }
}
