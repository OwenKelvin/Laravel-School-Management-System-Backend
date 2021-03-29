<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database Seeders.
   *
   * @return void
   */
  public function run()
  {
    factory(App\Models\User::class, 10)->create();
  }
}
