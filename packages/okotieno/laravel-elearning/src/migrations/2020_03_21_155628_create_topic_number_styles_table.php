<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicNumberStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_number_styles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('default');
            $table->boolean('active')->default(true);
            $table->softDeletes();
//            $table->timestamps();
        });
        DB::table('topic_number_styles')->insert([
            [
                'name' => 'Chapter',
                'default' => true
            ],
            [
                'name' => 'Topic',
                'default' => false
            ],
            [
                'name' => 'Module',
                'default' => false
            ],
            [
                'name' => 'Lesson',
                'default' => false
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topic_number_styles');
    }
}
