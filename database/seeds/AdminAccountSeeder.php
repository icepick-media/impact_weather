<?php

use App\Laravel\Models\User;
use Illuminate\Database\Seeder;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if(!User::where('type', "super_user")->first()) {
	        User::create([
                'name' => "Super User",
                'type' => "super_user",
                'username' => "admin",
                'email' => "admin@highlysucceed.com",
                'password' => bcrypt('admin')
            ]);
    	}
    }
}
