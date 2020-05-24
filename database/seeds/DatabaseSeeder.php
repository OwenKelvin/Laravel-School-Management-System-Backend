<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);
//        $this->call(PermissionAndRolesSeeder::class);
//        $this->call(ClassLevelSeeder::class);
//        $this->call(TimeTableSeeder::class);
//        $this->call(TeachersSeeder::class);
        $this->call(UnitsSeeder::class);
    }

}
