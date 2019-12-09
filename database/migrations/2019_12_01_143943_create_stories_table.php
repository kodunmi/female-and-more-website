<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('level_id');
            $table->integer('story_number');
            $table->string('story_week_number');
            $table->string('icon_name');
            $table->string('icon_image');
            $table->string('icon_career_path');
            $table->longText('icon_profile');
            $table->string('icon_quote');
            $table->longText('icon_experience');
            $table->longText('icon_step_to_glory');
            $table->string('is_current')->default('no');
            $table->string('is_completed')->default('no');
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
        Schema::dropIfExists('stories');
    }
}
