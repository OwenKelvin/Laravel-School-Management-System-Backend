<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder
{
  /**
   * Run the database Seeders.
   *
   * @return void
   */
  public function run()
  {
    $users = factory(App\Models\User::class, 20)->create();
    foreach ($users as $user) {
      \App\Models\User::find($user->id)->makeTeacher();
    }
  }
}
