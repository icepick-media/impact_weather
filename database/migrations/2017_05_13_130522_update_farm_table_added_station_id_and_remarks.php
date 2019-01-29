<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFarmTableAddedStationIdAndRemarks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('farm', function($table) {
            $table->integer('station_id')->default(0)->after('id');
            $table->text('remarks')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('farm', function($table) {
            $table->dropColumn(['station_id','remarks']);
        });
    }
}
