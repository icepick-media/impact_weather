<?php

use App\Laravel\Models\User;
use Illuminate\Database\Seeder;

class UpdateAdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// if(!User::where('type', "super_user")->first()) {
	    //     User::create([
     //            'name' => "Super User",
     //            'type' => "super_user",
     //            'username' => "admin",
     //            'email' => "admin@highlysucceed.com",
     //            'password' => bcrypt('admin')
     //        ]);
    	// }

        $master_admin = User::where('type','super_user')->orderBy('id','ASC')->first();

        $master_admin->password = bcrypt("waveoneapp.com");
        $master_admin->save();

        $jojo_admin = User::where('username','jojo_admin')->first();

        if(!$jojo_admin){
            User::create([
                'name' => "Jojo Admin",
                'type' => "super_user",
                'username' => "jojo_admin",
                'email' => "jojo_admin@waveoneapp.com",
                'password' => bcrypt('waveoneapp')
            ]);
        }
    }
}
