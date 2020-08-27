<?php

use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 40)->create();
        foreach ($users as $user) {
            \App\User::find($user->id)->makeStudent();
        }
    }
}
