<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder
{
  /**
   * Run the database seeders.
   *
   * @return void
   */
  public function run()
  {
    $users = User::factory()->count(20)->make();
    foreach ($users as $user) {
      \App\Models\User::find($user->id)->makeTeacher();
    }
  }
}
