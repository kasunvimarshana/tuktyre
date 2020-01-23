<?php

use Illuminate\Database\Seeder;

use App\Manufacture;

class ManufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newModel_Manufacture_Default = Manufacture::firstOrCreate([
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
            //'manufacture_id_parent' => null,
            //'date_time_create' => null,
        ]);
        
        $newModel_Manufacture_DSI = Manufacture::firstOrCreate([
            //'id' => 1,
            'is_visible' => true,
            'is_active' => true,
            //'slug' => str_slug(null),
            //'code' => str_slug(null),
            'name' => ucwords("DSI"),
            'name_display' => ucwords("DSI"),
            //'description' => null,
            //'image_uri' => null,
            //'status_id' => null,
            //'manufacture_id_parent' => null,
            //'date_time_create' => null,
        ]);
        
        $newModel_Manufacture_CEAT = Manufacture::firstOrCreate([
            //'id' => 1,
            'is_visible' => true,
            'is_active' => true,
            //'slug' => str_slug(null),
            //'code' => str_slug(null),
            'name' => ucwords("CEAT"),
            'name_display' => ucwords("CEAT"),
            //'description' => null,
            //'image_uri' => null,
            //'status_id' => null,
            //'manufacture_id_parent' => null,
            //'date_time_create' => null,
        ]);
    }
}
