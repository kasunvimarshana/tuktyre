<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newModel_Category_Default = Category::firstOrCreate([
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
            //'category_id_parent' => null,
            //'date_time_create' => null,
        ]);
    }
}

