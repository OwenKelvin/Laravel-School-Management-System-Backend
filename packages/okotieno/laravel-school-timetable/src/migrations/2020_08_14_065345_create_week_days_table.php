<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeekDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('abbreviation');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('week_days')->insert([
            [ 'name' => 'Monday', 'abbreviation' => 'Mon', 'active'=>true],
            [ 'name' => 'Tuesday', 'abbreviation' => 'Tue', 'active'=>true],
            [ 'name' => 'Wedneday', 'abbreviation' => 'Wed', 'active'=>true],
            [ 'name' => 'Thursday', 'abbreviation' => 'Thur', 'active'=>true],
            [ 'name' => 'Friday', 'abbreviation' => 'Fri', 'active'=>true],
            [ 'name' => 'Saturday', 'abbreviation' => 'Sat', 'active'=>false],
            [ 'name' => 'Sunday', 'abbreviation' => 'Sun', 'active'=>false],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('week_days');
    }
}
