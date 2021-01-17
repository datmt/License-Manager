<?php


namespace App\Helpers;


use App\Models\Product;
use App\Models\Subscription;

class SubscriptionHelper
{
    public static function create($timeAdded, $customerId, $productId, $amountSpent) {
        $subscription = new Subscription();

        $now = time();

        $subscription->valid_until = $now + $timeAdded;
        $subscription->customer_id = $customerId;
        $subscription->product_id = $productId;
        $subscription->amount_spent = $amountSpent;
        $subscription->license_key = self::_genKey();
        $subscription->created_at = $now;
        $subscription->updated_at = $now;

        $subscription->save();
    }

    private static function _genKey(){
        $key = [];
        for ($i = 0; $i < 5; $i++) {
            $key[]= strtoupper(substr(md5(rand()), 0, 5));
        }

        return implode("-", $key);
    }
}
