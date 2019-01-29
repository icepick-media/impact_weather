<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateJournalTableAddStartEndTimeField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('journal', function($table) {
            $table->time('start_time')->default("00:00");
            $table->time('end_time')->default("00:00");
            $table->float('qty')->default("0");
            $table->string('brand')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('journal', function($table) {
            $table->dropColumn(['start_time','end_time','qty','brand']);
        });
    }
}
