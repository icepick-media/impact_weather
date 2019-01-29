<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStationTableAddMetosCredFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('station', function($table) {
            $table->string('private_key')->nullable()->after('street_address');
            $table->string('public_key')->nullable()->after('street_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('station', function($table) {
            $table->dropColumn(['private_key', 'public_key']);
        });
    }
}
