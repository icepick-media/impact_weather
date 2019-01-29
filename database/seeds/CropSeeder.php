<?php

use App\Laravel\Models\Crop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crop::truncate();

        // $crops = ['Rice', 'Corn', 'Eggplant', 'Mango', 'Tobacco', 'Sweet Potato'];
        // foreach ($crops as $key => $crop) {
        // 	Crop::create(['name' => $crop, 'code' => Str::slug($crop)]);
        // }

        Crop::create(['name' => "Corn", 'code' => Str::slug("Corn"),'variety' => "Normal Sugary,Sugary Enhancer,Supersweet,Other"]);
        Crop::create(['name' => "Rice", 'code' => Str::slug("Rice"), 'variety' => "PSB RC2(NAHALIN),PSB RC2(MOLAWIN),NSIC RC396 (TUBIGAN 33),Other"]);
    }
}
