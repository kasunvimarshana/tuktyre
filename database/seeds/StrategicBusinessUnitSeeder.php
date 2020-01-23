<?php

use Illuminate\Database\Seeder;

use App\StrategicBusinessUnit;

class StrategicBusinessUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newModel_StrategicBusinessUnit_Default = StrategicBusinessUnit::firstOrCreate([
            //'id' => 1,
            'is_visible' => false,
            'is_active' => false,
            //'slug' => str_slug("Default"),
            //'code' => str_slug("Default"),
            'name' => ucwords("Default"),
            'name_display' => ucwords("Default"),
            //'address' => null,
            //'latitude' => null,
            //'longitude' => null,
            //'description' => null,
            //'image_uri' => null,
            //'status_id' => null,
            //'strategic_business_unit_id_parent' => null,
            //'company_id' => null,
            //'date_time_create' => null,
        ]);
    }
}
