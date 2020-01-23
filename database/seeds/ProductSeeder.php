<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newModel_Product_Default = Product::firstOrCreate([
            //'id' => 1,
            'is_visible' => false,
            'is_active' => false,
            //'slug' => str_slug("Default"),
            //'code' => str_slug("Default"),
            'name' => ucwords("Default"),
            'name_display' => ucwords("Default"),
            //'description' => null,
            //'image_uri' => null,
            //'status_id' => null,
            //'product_id_parent' => null,
            //'date_time_create' => null,
        ]);
        
        $newModel_Product_Tyre = Product::firstOrCreate([
            //'id' => 1,
            'is_visible' => false,
            'is_active' => false,
            //'slug' => str_slug(null),
            //'code' => str_slug(null),
            'name' => ucwords("Tyre"),
            'name_display' => ucwords("Tyre"),
            //'description' => null,
            //'image_uri' => null,
            //'status_id' => null,
            //'product_id_parent' => null,
            //'date_time_create' => null,
        ]);
        
        $newModel_Product_Battery = Product::firstOrCreate([
            //'id' => 1,
            'is_visible' => false,
            'is_active' => false,
            //'slug' => str_slug(null),
            //'code' => str_slug(null),
            'name' => ucwords("Battery"),
            'name_display' => ucwords("Battery"),
            //'description' => null,
            //'image_uri' => null,
            //'status_id' => null,
            //'product_id_parent' => null,
            //'date_time_create' => null,
        ]);
        
        $newModel_Product_AlloyWheels = Product::firstOrCreate([
            //'id' => 1,
            'is_visible' => false,
            'is_active' => false,
            //'slug' => str_slug(null),
            //'code' => str_slug(null),
            'name' => ucwords("Alloy Wheels"),
            'name_display' => ucwords("Alloy Wheels"),
            //'description' => null,
            //'image_uri' => null,
            //'status_id' => null,
            //'product_id_parent' => null,
            //'date_time_create' => null,
        ]);
    }
}
