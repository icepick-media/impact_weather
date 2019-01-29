<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(FullReset::class);
        $this->call(AdminAccountSeeder::class);
        $this->call(ResponseMessageSeeder::class);
    }
}
