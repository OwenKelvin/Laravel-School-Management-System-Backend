<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateELearningCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_learning_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('class_level_id');
            $table->integer('academic_year_id');
            $table->integer('unit_id');
            $table->integer('topic_number_style_id');
            $table->longText('description')->default(null);
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
        Schema::dropIfExists('e_learning_courses');
    }
}
