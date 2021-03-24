<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamPaperQuestionExamPaperQuestionTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_paper_question_exam_paper_question_tag', function (Blueprint $table) {
//            $table->bigIncrements('id');
            $table->integer('exam_paper_question_id');
            $table->integer('exam_paper_question_tag_id');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_paper_question_exam_paper_question_tag');
    }
}
