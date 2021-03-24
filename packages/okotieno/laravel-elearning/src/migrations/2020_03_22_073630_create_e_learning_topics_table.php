<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateELearningTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_learning_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('e_learning_topic_id')->nullable();
            $table->integer('e_learning_course_id')->nullable();
            $table->integer('topic_number_style_id')->nullable();
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
        Schema::dropIfExists('e_learning_topics');
    }
}
