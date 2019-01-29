<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommendation', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->string('type', 50);
            $table->decimal('temp_min', 5,2)->default(0);
            $table->decimal('temp_max', 5,2)->default(0);
            $table->decimal('humidity_min', 5,2)->default(0);
            $table->decimal('humidity_max', 5,2)->default(0);
            $table->decimal('wind_speed_min', 5,2)->default(0);
            $table->decimal('wind_speed_max', 5,2)->default(0);
            $table->decimal('prob_of_precip_min', 5,2)->default(0);
            $table->decimal('prob_of_precip_max', 5,2)->default(0);
            $table->decimal('precipitation_min', 5,2)->default(0);
            $table->decimal('precipitation_max', 5,2)->default(0);
            $table->string('status', 50)->default('active');
            // $table->text('criteria');
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
        Schema::dropIfExists('recommendation');
    }
}
