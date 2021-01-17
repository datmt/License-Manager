<?php


namespace App\Helpers;


use App\Models\Product;

class ProductHelper
{
    public static function create($name, $description, $machineCount, $price, $addedTime, $landingPageUrl) {
        $product = new Product();
        $product->name = $name;
        $product->description = $description;
        $product->machine_count = $machineCount;
        $product->price = $price;
        $product->add_time = $addedTime;
        $product->landing_page_url = $landingPageUrl;
        $now = time();
        $product->created_at = $now;
        $product->updated_at = $now;

        $product->save();
    }
}
