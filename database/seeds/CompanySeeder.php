<?php

use Illuminate\Database\Seeder;

use App\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newModel_Company_Default = Company::firstOrCreate([
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
            //'company_id_parent' => null,
            //'date_time_create' => null,
        ]);
    }
}

