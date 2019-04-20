<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('name');
            $table->integer('farm_id')->nullable();
            $table->integer('crop_id')->nullable();
            $table->string('activity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity', function (Blueprint $table) {
            $table->string('code')->nullable();
            $table->string('name')->nullable();
        });
    }
}
