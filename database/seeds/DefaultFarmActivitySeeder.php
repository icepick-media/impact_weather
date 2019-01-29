<?php

use App\Laravel\Models\FarmActivity;
use Illuminate\Database\Seeder;

class DefaultFarmActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FarmActivity::truncate();


        FarmActivity::create([ 'id' => 1, 'name' => "Seeding", 'code'  => "seeding" ]);
        FarmActivity::create([ 'id' => 2, 'name' => "Planting", 'code'  => "planting" ]);
        FarmActivity::create([ 'id' => 3, 'name' => "Harvesting", 'code'  => "harvesting" ]);
        FarmActivity::create([ 'id' => 4, 'name' => "Fertilizing", 'code'  => "fertilizing" ]);
    }
}