<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRegistrantContractAddAllowWeatherStationField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrant_contact', function($table) {
            $table->string('allow_weather_station')->default("yes")->nullable(); // hPa

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrant_contact', function($table) {
            $table->dropColumn(['allow_weather_station']);
        });
    }
}
