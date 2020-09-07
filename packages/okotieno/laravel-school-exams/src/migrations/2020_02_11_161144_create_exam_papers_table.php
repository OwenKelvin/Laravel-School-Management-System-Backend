<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_papers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('unit_level_id')->unsigned();
            $table->boolean('available')->default(false);
            $table->boolean('private')->default(false);
            $table->boolean('access_by_key')->default(false);
            $table->boolean('created_by');
            $table->softDeletes();
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
        Schema::dropIfExists('exam_papers');
    }
}
