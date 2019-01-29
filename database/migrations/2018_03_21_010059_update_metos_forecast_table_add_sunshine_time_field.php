<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMetosForecastTableAddSunshineTimeField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('metos_forecast', function($table) {
            $table->decimal('radiation', 6, 2)->default(0); // hPa
            $table->decimal('sunshine_time', 6, 2)->default(0); // %

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('metos_forecast', function($table) {
            $table->dropColumn(['radiation','sunshine_time']);
        });
    }
}
