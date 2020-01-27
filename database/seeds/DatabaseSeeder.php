<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(ColourSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(TransactionTypeSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(StrategicBusinessUnitSeeder::class);
        $this->call(UserTypeSeeder::class);
        $this->call(VehicleTypeSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ManufactureSeeder::class);
        $this->call(MeasureUnitSeeder::class);
        $this->call(ItemSeeder::class);
    }
}
