<?php


namespace App\Helpers;


use App\Models\Activation;
use App\Models\Product;

class ActivationHelper
{
    public static function create($subscriptionId, $machineId, $machineType = 'web') {

        $activation = new Activation();
        $activation->subscription_id = $subscriptionId;
        $activation->machine_id = $machineId;
        $activation->machine_type = $machineType;
        $now = time();
        $activation->created_at = $now;
        $activation->updated_at = $now;

        $activation->save();
    }
}
