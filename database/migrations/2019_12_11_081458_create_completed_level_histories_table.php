<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedLevelHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_level_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('level_number');
            $table->integer('no_of_participants')->nullable();
            $table->integer('no_of_participants_that_did_no_complete_level')->nullable();
            $table->integer('no_of_participants_that_completed_level')->nullable();
            $table->string('date_level_started')->nullable();
            $table->string('date_level_completed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('completed_level_histories');
    }
}
