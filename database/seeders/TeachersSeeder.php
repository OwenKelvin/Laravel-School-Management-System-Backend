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
    $users = User::factory()->count(20)->create();
    foreach ($users as $user) {
      User::find($user->id)->makeTeacher();
    }
  }
}
