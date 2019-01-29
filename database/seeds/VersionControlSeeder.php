<?php

use Illuminate\Database\Seeder;
use App\Laravel\Models\VersionControl;

class VersionControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $version = new VersionControl;
        $version->version_name = "0.0";
        $version->major_version = "0";
        $version->minor_version = "0";
        $version->changelogs = "Initial development.";
        $version->save();
    }
}
