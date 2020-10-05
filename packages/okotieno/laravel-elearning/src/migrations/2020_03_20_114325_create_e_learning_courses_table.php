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
      $table->integer('class_level_id')->unsigned();
      $table->integer('unit_level_id')->unsigned();
      $table->integer('academic_year_id')->unsigned();
      $table->integer('unit_id')->unsigned();
      $table->integer('topic_number_style_id')->unsigned();
      $table->longText('description')->nullable();
      $table->timestamps();
      $table->softDeletes();
      $table->foreign('unit_level_id')
        ->references('id')
        ->on('unit_levels');
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
