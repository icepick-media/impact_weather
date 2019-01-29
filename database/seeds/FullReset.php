<?php

use App\Laravel\Models\AuthCode;
use App\Laravel\Models\Crop;
use App\Laravel\Models\Farm;
use App\Laravel\Models\FarmCrop;
use App\Laravel\Models\FarmMap;
use App\Laravel\Models\PasswordReset;
use App\Laravel\Models\ResponseMessage;
use App\Laravel\Models\User;
use App\Laravel\Models\UserDevice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FullReset extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		PasswordReset::truncate();
		User::truncate();
		UserDevice::truncate();
        ResponseMessage::truncate();
        AuthCode::truncate();
        Farm::truncate();
        FarmMap::truncate();
        FarmCrop::truncate();
        Crop::truncate();
        DB::table('notifications')->truncate();
        DB::table('failed_jobs')->truncate();
        DB::table('jobs')->truncate();
    }
}
