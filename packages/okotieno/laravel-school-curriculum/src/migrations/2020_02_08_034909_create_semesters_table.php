<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default(false);
            $table->boolean('active')->default(false);
            $table->string('abbreviation')->default(false);
            $table->integer('semester_type_id')->default(false);
            $table->softDeletes();
            // $table->timestamps();
        });
        DB::table('semesters')->insert([
            [
                'name' => 'Term 1',
                'active' => true,
                'abbreviation' => 'T1',
                'semester_type_id' => 1
            ],
            [
                'name' => 'Term 2',
                'active' => true,
                'abbreviation' => 'T2',
                'semester_type_id' => 1
            ],[
                'name' => 'Term 3',
                'active' => true,
                'abbreviation' => 'T3',
                'semester_type_id' => 1
            ],[
                'name' => 'Semester 1',
                'active' => false,
                'abbreviation' => 'Sem1',
                'semester_type_id' => 2
            ],[
                'name' => 'Semester 2',
                'active' => false,
                'abbreviation' => 'Sem2',
                'semester_type_id' => 2
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semesters');
    }
}
