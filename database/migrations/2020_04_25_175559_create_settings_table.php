<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('value');
        });

        DB::table('settings')->insert([
            ['name' => 'School Prefix', 'value'=> 'S'],
            ['name' => 'School Name', 'value'=> 'Tahidi Academy'],
            ['name' => 'Student Per Page', 'value'=> '50'],
            ['name' => 'Default Password', 'value'=> 'Manager&1234'],
            ['name' => 'Maximum Plan Years', 'value'=> '10'],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
