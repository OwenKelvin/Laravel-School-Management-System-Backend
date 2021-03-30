<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionAndRolesSeeder extends Seeder
{
  /**
   * Run the database seeders.
   *
   * @return void
   */
  public function run()
  {
    try {
      Role::create([
        'name' => 'super admin'
      ]);
    } catch (Exception $exception) {
    }
    try {
      Role::create([
        'name' => 'student'
      ]);
    } catch (Exception $exception) {
    }
    $permissions = [
      [
        'permission' => 'change role permissions',
        'roles' => ['admin', 'head teacher']
      ],
      [
        'permission' => 'assign role',
        'roles' => ['admin', 'maker admissions', 'verifier admissions', 'head teacher', 'deputy head teacher', 'dean of students',]
      ],
      [
        'permission' => 'edit library book tag',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'add library book tag',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'add library book',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'edit library book',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'view issued books',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'issue library book',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'mark library book returned',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'access library admin',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'add library user',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'add library user',
        'roles' => ['admin', 'librarian', 'maker admissions']
      ],
      [
        'permission' => 'block library user',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'unblock library user',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'add library book author',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'edit library book author',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'add library book publisher',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'edit library book publisher',
        'roles' => ['admin', 'librarian']
      ],
      [
        'permission' => 'access library account',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'teacher',
          'class teacher',
          'dean of students',
          'finance officer',
          'head of finance',
          'school bursar',
          'school board',
          'school board secretary',
          'librarian',
          'laboratory assistant',
        ]
      ],
      [
        'permission' => 'access library',
        'roles' => [
          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'teacher',
          'class teacher',
          'dean of students',
          'finance officer',
          'head of finance',
          'school bursar',
          'school board',
          'school board secretary',
          'librarian',
          'laboratory assistant',
        ]
      ],
      [
        'permission' => 'add student to stream',
        'roles' => [

          'admin',
          'maker admissions',
          'dean of students',
          'class teacher',
        ]
      ],
      [
        'permission' => 'access synchronize data',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'access county sync',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'sync to county',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'view management',
        'roles' => [

          'admin',
          'dean of students',
        ]
      ],
      [
        'permission' => 'view teacher management',
        'roles' => [

          'admin',
          'dean of students',
        ]
      ],
      [
        'permission' => 'create teacher management',
        'roles' => [

          'admin',
          'dean of students',
        ]
      ],
      [
        'permission' => 'edit teacher management',
        'roles' => [

          'admin',
          'dean of students',
        ]
      ],
      [
        'permission' => 'view student management',
        'roles' => [

          'admin',
          'dean of students',
          'class teacher',
        ]
      ],
      [
        'permission' => 'create student management',
        'roles' => [

          'admin',
          'dean of students',
          'class teacher',
        ]
      ],


      [
        'permission' => 'edit student management',
        'roles' => [

          'admin',
          'dean of students',
          'class teacher',
        ]
      ],
      [
        'permission' => 'view management',
        'roles' => [

          'admin',
          'dean of students',
          'class teacher',
        ]
      ],
      [
        'permission' => 'enter scores',
        'roles' => [

          'admin',
          'teacher',
          'class teacher',
        ]
      ],
      [
        'permission' => 'view subject registrations',
        'roles' => [

          'admin',
          'dean of students',
          'teacher',
          'class teacher',
        ]
      ],
      [
        'permission' => 'edit subject registrations',
        'roles' => [

          'admin',
          'dean of students',
          'class teacher',
        ]
      ],

      //
      [
        'permission' => 'create school department',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'edit school department',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'view scores',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'teacher',
          'class teacher',
          'dean of students',
          'school board',
          'school board secretary',
        ]
      ],
      [
        'permission' => 'access student scores',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'teacher',
          'class teacher',
          'dean of students',
          'school board',
          'school board secretary',
        ]
      ],
      [
        'permission' => 'view student scores reports',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'teacher',
          'class teacher',
          'dean of students',
          'school board',
          'school board secretary',
        ]
      ],
      [
        'permission' => 'access student academic reports',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'teacher',
          'class teacher',
          'dean of students',
          'school board',
          'school board secretary',
        ]
      ],
      [
        'permission' => 'view student subject registration',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'teacher',
          'class teacher',
          'dean of students',
          'finance officer',
          'head of finance',
          'laboratory assistant',
        ]
      ],
      [
        'permission' => 'view student class list',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'teacher',
          'class teacher',
          'dean of students',
          'finance officer',
          'head of finance',
          'school bursar',
          'school board',
          'school board secretary',
          'librarian',
          'laboratory assistant',
        ]
      ],
      [
        'permission' => 'access student list report',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'teacher',
          'class teacher',
          'dean of students',
          'finance officer',
          'head of finance',
          'school bursar',
          'school board',
          'school board secretary',
          'librarian',
          'laboratory assistant',
        ]
      ],
      [
        'permission' => 'access reports',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'teacher',
          'class teacher',
          'dean of students',
          'finance officer',
          'head of finance',
          'school bursar',
          'school board',
          'school board secretary',
          'librarian',
          'laboratory assistant',
        ]
      ],
      [
        'permission' => 'access reports',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'teacher',
          'class teacher',
          'dean of students',
          'finance officer',
          'head of finance',
          'school bursar',
          'school board',
          'school board secretary',
          'librarian',
          'laboratory assistant',
        ]
      ],
      [
        'permission' => 'create financial plan',
        'roles' => [

          'admin',
          'accountant',
          'head accountant',
          'finance officer',
          'head of finance',
        ]
      ],
      [
        'permission' => 'access financial plan',
        'roles' => [

          'admin',
          'accountant',
          'head accountant',
          'finance officer',
          'head of finance',
          'school bursar',
        ]
      ],
      [
        'permission' => 'receive student payment',
        'roles' => [

          'admin',
          'accountant',
          'head accountant',
          'finance officer',
          'head of finance',
          'school bursar',
        ]
      ],
      [
        'permission' => 'access student payment',
        'roles' => [

          'admin',
          'accountant',
          'head accountant',
          'finance officer',
          'head of finance',
        ]
      ],
      [
        'permission' => 'access accounting',
        'roles' => [

          'admin',
          'accountant',
          'head accountant',
          'finance officer',
          'head of finance',
          'school bursar',
        ]
      ],

      [
        'permission' => 'create time table schedule',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'class teacher',
          'maker admissions',
        ]
      ],
      [
        'permission' => 'update time table schedule',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'class teacher',
          'maker admissions',
        ]
      ],
      [
        'permission' => 'create time table',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'class teacher',
          'maker admissions',
        ]
      ],
      [
        'permission' => 'update time table',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'class teacher',
          'maker admissions',
        ]
      ],
      [
        'permission' => 'assign subject to teacher',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'class teacher',
          'maker admissions',
        ]
      ],
      [
        'permission' => 'create timetable plan',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'class teacher'
        ]
      ],
      [
        'permission' => 'access timetable plan',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'class teacher'
        ]
      ],
      [
        'permission' => 'create exam plan',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'class teacher',
        ]
      ],
      [
        'permission' => 'access exam plan',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'class teacher',
        ]
      ],
      [
        'permission' => 'update term',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'create term',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'update fee plan',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'dean of students',
          'finance officer',
          'head of finance',
        ]
      ],
      [
        'permission' => 'create fee plan',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'dean of students',
          'finance officer',
          'head of finance',
        ]
      ],
      [
        'permission' => 'access fee plan',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'dean of students',
          'finance officer',
          'head of finance',
          'school bursar',
        ]
      ],
      [
        'permission' => 'receive student fee payment',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'dean of students',
          'finance officer',
          'head of finance',
          'school bursar',
        ]
      ],
      [
        'permission' => 'send message',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'teacher',
          'class teacher',
          'dean of students',
          'finance officer',
          'head of finance',
          'school bursar',
          'school board',
          'school board secretary',
          'librarian',
          'laboratory assistant',
        ]
      ],
      [
        'permission' => 'create course outline topic',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'teacher',
          'class teacher',
        ]
      ],

      [
        'permission' => 'update course outline topic',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'teacher',
          'class teacher',
        ]
      ],
      [
        'permission' => 'view study materials',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'teacher',
          'class teacher',
        ]
      ],
      [
        'permission' => 'upload curriculum content',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'teacher',
          'class teacher',
        ]
      ],
      [
        'permission' => 'update curriculum content',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'teacher',
          'class teacher',
        ]
      ],
      [
        'permission' => 'create course outline',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'teacher',
          'class teacher',
        ]
      ],
      [
        'permission' => 'access academics',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'teacher',
          'class teacher',
        ]
      ],
      [
        'permission' => 'view subject curriculum',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'teacher',
          'class teacher',
          'student',
          'guardian'
        ]
      ],
      [
        'permission' => 'edit subject curriculum',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'teacher',
          'class teacher',
        ]
      ],
      [
        'permission' => 'create subject curriculum',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'teacher',
          'class teacher',
        ]
      ],
      [
        'permission' => 'access curriculum management',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'teacher',
          'class teacher',
        ]
      ],
      [
        'permission' => 'update medical condition',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'maker admissions'
        ]
      ],
      [
        'permission' => 'create medical condition',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'maker admissions'
        ]
      ],
      [
        'permission' => 'update class level',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'create class level',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'view student class level',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'class teacher'
        ]
      ],
      [
        'permission' => 'update student class level',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'class teacher'
        ]
      ],
      [
        'permission' => 'create time table type',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'update time table type',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'create stream',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'view academic year',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'create academic year',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'access academic year',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'access academic year management',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'update subject',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],

      [
        'permission' => 'create subject',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'update subject category',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],

      [
        'permission' => 'create subject category',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
        ]
      ],
      [
        'permission' => 'update school level',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
        ]
      ],
      [
        'permission' => 'create school level',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
        ]
      ],

      [
        'permission' => 'update curriculum system',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
        ]
      ],
      [
        'permission' => 'create curriculum system',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
        ]
      ],
      [
        'permission' => 'access teacher admission',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions'
        ]
      ],
      [
        'permission' => 'create student',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions'
        ]
      ],
      [
        'permission' => 'read student',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'teacher',
          'class teacher',
          'dean of students',
          'finance officer',
          'head of finance',
          'school bursar',
          'school board',
          'school board secretary',
          'librarian',
          'laboratory assistant',

        ]
      ],
      [
        'permission' => 'view admissions',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions'
        ]
      ],
      [
        'permission' => 'view student admissions',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'teacher',
          'class teacher',
          'dean of students',
          'finance officer',
          'head of finance',
          'school bursar',
          'school board',
          'school board secretary',
          'librarian',
          'laboratory assistant',

        ]
      ],
      [
        'permission' => 'update student subjects',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'dean of students',
          'class teacher',
          'teacher'
        ]
      ],
      [
        'permission' => 'update student',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
        ]
      ],
      [
        'permission' => 'delete student',
        'roles' => [

          'admin',
          'verifier admissions',
          'deputy head teacher',
          'dean of students',
        ]
      ],

      [
        'permission' => 'verify student',
        'roles' => [

          'admin',
          'verifier admissions',
        ]
      ],
      [
        'permission' => 'create student bulk',
        'roles' => [

          'admin',
          'maker admissions',
        ]
      ],
      [
        'permission' => 'create teacher',
        'roles' => [

          'admin',
          'maker admissions',
        ]
      ],
      [
        'permission' => 'create support staff',
        'roles' => [

          'admin',
          'maker admissions',
          'hr admissions maker',
        ]
      ],
      [
        'permission' => 'read teacher',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'teacher',
          'class teacher',
          'dean of students',
          'school board',
          'school board secretary',
          'librarian',
          'laboratory assistant',
        ]
      ],
      [
        'permission' => 'update teacher',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'dean of students',
        ]
      ],
      [
        'permission' => 'delete teacher',
        'roles' => [

          'admin',
          'verifier admissions',
          'head teacher',
        ]
      ],
      [
        'permission' => 'verify teacher',
        'roles' => [

          'admin',
          'verifier admissions',
          'dean of students',
        ]
      ],
      [
        'permission' => 'create guardian',
        'roles' => [

          'admin',
          'maker admissions',
        ]
      ],
      [
        'permission' => 'read guardian',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'teacher',
          'class teacher',
          'dean of students',
          'school board',
          'school board secretary',
          'librarian',
          'laboratory assistant',
        ]
      ],
      [
        'permission' => 'update guardian',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'dean of students',
        ]
      ],
      [
        'permission' => 'delete guardian',
        'roles' => [

          'admin',
          'verifier admissions',
          'head teacher',
        ]
      ],
      [
        'permission' => 'verify guardian',
        'roles' => [

          'admin',
          'verifier admissions',
          'dean of students',
        ]
      ],
      [
        'permission' => 'make procurement request',
        'roles' => [

          'admin',
          'maker admissions',
          'verifier admissions',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'teacher',
          'class teacher',
          'dean of students',
          'finance officer',
          'head of finance',
          'school bursar',
          'school board',
          'school board secretary',
          'librarian',
          'laboratory assistant',
        ]
      ],
      [
        'permission' => 'approve procurement request',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'head of finance',
        ]
      ],
      [
        'permission' => 'create procurement vendor',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'dean of students',
          'head of finance',
          'head accountant',
        ]
      ],
      [
        'permission' => 'create procurement tender',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'dean of students',
          'finance officer',
          'head of finance'
        ]
      ],
      [
        'permission' => 'approve procurement tender',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'head of finance'
        ]
      ],
      [
        'permission' => 'create procurement bid',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'accountant',
          'head accountant',
          'finance officer',
          'head of finance',
          'school bursar',
        ]
      ],
      [
        'permission' => 'upload study materials',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'teacher',
          'class teacher',
          'dean of students',
          'librarian',
        ]
      ],
      [
        'permission' => 'create e-learning course',
        'roles' => [

          'admin',
          'head teacher',
          'deputy head teacher',
          'teacher',
          'class teacher',
          'dean of students',
          'librarian',
        ]
      ],
      [
        'permission' => 'view my dependants',
        'roles' => [

          'admin',
          'guardian',
        ]
      ],
      [
        'permission' => 'create online assessment',
        'roles' => [
          'teacher',
          'class teacher',
          'dean of students'
        ]
      ],
    ];
//
    foreach ($permissions as $index => $permission) {
      echo ($index + 1) . " of " . sizeof($permissions) . "\r";
      if ($permission_saved = Permission::where('name', $permission['permission'])->first()) {

      } else {
        $permission_saved = Permission::create(['name' => $permission['permission']]);
      }

      foreach ($permission['roles'] as $role) {
        if ($role_saved = Role::where('name', $role)->first()) {

        } else {
          $role_saved = Role::create(['name' => $role]);
        }
        $permission_saved->assignRole($role_saved);
      }

    };
    try {
      \App\Models\User::create([
        'first_name' => 'Admin',
        'last_name' => 'Admin',
        'email' => 'info@furahasolutions.tech'
      ])->setPassword('Password1')->assignRole('super admin');
    } catch (Exception $e) {
    }

    Role::where('name', 'student')->first()
      ->update(['is_staff' => false]);
    Role::where('name', 'guardian')->first()
      ->update(['is_staff' => false]);
    Role::where('name', 'teacher')->first()
      ->update(['is_staff' => false]);
    Role::where('name', 'super admin')->first()
      ->update(['is_staff' => false]);
    Role::where('name', 'admin')->first()
      ->update(['is_staff' => false]);
  }
}
