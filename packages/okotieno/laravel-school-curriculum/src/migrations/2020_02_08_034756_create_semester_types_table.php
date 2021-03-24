<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemesterTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default(false);
            $table->boolean('active')->default(false);
            $table->boolean('default')->default(false);
            $table->softDeletes();
        });
        DB::table('semester_types')->insert([
            ['id' => 1, 'name' => '3 Terms Per Year', 'default'=> true, 'active' => true ],
            ['id' => 2,'name' => '2 Semesters Per Year', 'default'=> false, 'active' => false, ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semester_types');
    }
}
