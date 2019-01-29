<?php

use App\Laravel\Models\User;
use Illuminate\Database\Seeder;

class SyncAccountPasswords extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $key => $user) {
        	if(!$user->password) {
        		$user->password = bcrypt($user->contact);
        		$user->save();
        	}
        }
    }
}
