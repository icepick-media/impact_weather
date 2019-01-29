<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetosForecastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metos_forecast', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('station_id');
            $table->dateTime('schedule');
            $table->integer('hour')->default(0);
            $table->decimal('temperature', 6, 2)->default(0); // celsius
            $table->decimal('feeled_temperature', 6, 2)->default(0); // celsius
            $table->decimal('wind_speed', 6, 2)->default(0); // km/hr
            $table->decimal('wind_direction', 6, 2)->default(0); // degr
            $table->decimal('wind_gust', 6, 2)->default(0); // km/hr
            $table->decimal('low_clouds', 6, 2)->default(0); // %
            $table->decimal('medium_clouds', 6, 2)->default(0); // %
            $table->decimal('high_clouds', 6, 2)->default(0); // %
            $table->decimal('precipitation', 6, 2)->default(0); // mm
            $table->decimal('probability_of_precip', 6, 2)->default(0); // %
            $table->decimal('snow_fraction', 6, 2)->default(0);
            $table->decimal('sea_level_pressure', 6, 2)->default(0); // hPa
            $table->decimal('relative_humidity', 6, 2)->default(0); // %
            $table->string('cape')->nullable();
            $table->string('picto_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metos_forecast');
    }
}
