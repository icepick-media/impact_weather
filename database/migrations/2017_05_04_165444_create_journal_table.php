<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('farm_id')->default(0);

            $table->string('title', 150);
            $table->string('crop', 150)->nullable();
            $table->date('entry_date');
            $table->string('status', 50)->default("low");

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
        Schema::dropIfExists('journal');
    }
}
