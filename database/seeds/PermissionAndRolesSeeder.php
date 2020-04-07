<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'permission' => 'edit library book tag',
                'roles' => [
                    'super admin',
                    'admin',
                    'deputy head teacher',
                    'librarian',
                ]
            ],
            [
                'permission' => 'add library book tag',
                'roles' => [
                    'super admin',
                    'admin',
                    'deputy head teacher',
                    'librarian',
                ]
            ],
            [
                'permission' => 'add library book',
                'roles' => [
                    'super admin',
                    'admin',
                    'deputy head teacher',
                    'librarian',
                ]
            ],
            [
                'permission' => 'edit library book',
                'roles' => [
                    'super admin',
                    'admin',
                    'deputy head teacher',
                    'librarian',
                ]
            ],
            [
                'permission' => 'view issued books',
                'roles' => [
                    'super admin',
                    'admin',
                    'deputy head teacher',
                    'librarian',
                ]
            ],
            [
                'permission' => 'issue library book',
                'roles' => [
                    'super admin',
                    'admin',
                    'deputy head teacher',
                    'librarian',
                ]
            ],
            [
                'permission' => 'mark library book returned',
                'roles' => [
                    'super admin',
                    'admin',
                    'deputy head teacher',
                    'librarian',
                ]
            ],
            [
                'permission' => 'access library admin',
                'roles' => [
                    'super admin',
                    'admin',
                    'deputy head teacher',
                    'librarian',
                ]
            ],
            [
                'permission' => 'access library account',
                'roles' => [
                    'super admin',
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
                    'super admin',
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
                    'super admin',
                    'admin',
                    'maker admissions',
                    'dean of students',
                    'class teacher',
                ]
            ],
            [
                'permission' => 'access synchronize data',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'access county sync',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'sync to county',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'view management',
                'roles' => [
                    'super admin',
                    'admin',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'view teacher management',
                'roles' => [
                    'super admin',
                    'admin',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'create teacher management',
                'roles' => [
                    'super admin',
                    'admin',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'edit teacher management',
                'roles' => [
                    'super admin',
                    'admin',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'view student management',
                'roles' => [
                    'super admin',
                    'admin',
                    'dean of students',
                    'class teacher',
                ]
            ],
            [
                'permission' => 'create student management',
                'roles' => [
                    'super admin',
                    'admin',
                    'dean of students',
                    'class teacher',
                ]
            ],


            [
                'permission' => 'edit student management',
                'roles' => [
                    'super admin',
                    'admin',
                    'dean of students',
                    'class teacher',
                ]
            ],
            [
                'permission' => 'view management',
                'roles' => [
                    'super admin',
                    'admin',
                    'dean of students',
                    'class teacher',
                ]
            ],
            [
                'permission' => 'enter scores',
                'roles' => [
                    'super admin',
                    'admin',
                    'teacher',
                    'class teacher',
                ]
            ],
            [
                'permission' => 'view subject registrations',
                'roles' => [
                    'super admin',
                    'admin',
                    'dean of students',
                    'teacher',
                    'class teacher',
                ]
            ],
            [
                'permission' => 'edit subject registrations',
                'roles' => [
                    'super admin',
                    'admin',
                    'dean of students',
                    'class teacher',
                ]
            ],

            //
            [
                'permission' => 'create school department',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'edit school department',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'view scores',
                'roles' => [
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'create term',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'update fee plan',
                'roles' => [
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'create class level',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'view student class level',
                'roles' => [
                    'super admin',
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
                    'super admin',
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
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'update time table type',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'create stream',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'view academic year',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'create academic year',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'access academic year',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'access academic year management',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'update subject',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],

            [
                'permission' => 'create subject',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'update subject category',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],

            [
                'permission' => 'create subject category',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'update school level',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                ]
            ],
            [
                'permission' => 'create school level',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                ]
            ],

            [
                'permission' => 'update curriculum system',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                ]
            ],
            [
                'permission' => 'create curriculum system',
                'roles' => [
                    'super admin',
                    'admin',
                    'head teacher',
                    'deputy head teacher',
                ]
            ],
            [
                'permission' => 'access teacher admission',
                'roles' => [
                    'super admin',
                    'admin',
                    'maker admissions',
                    'verifier admissions'
                ]
            ],
            [
                'permission' => 'create student',
                'roles' => [
                    'super admin',
                    'admin',
                    'maker admissions',
                    'verifier admissions'
                ]
            ],
            [
                'permission' => 'read student',
                'roles' => [
                    'super admin',
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
                    'super admin',
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
                'permission' => 'view student admissions',
                'roles' => [
                    'super admin',
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
                    'super admin',
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
                    'super admin',
                    'admin',
                    'maker admissions',
                    'verifier admissions',
                ]
            ],
            [
                'permission' => 'delete student',
                'roles' => [
                    'super admin',
                    'admin',
                    'verifier admissions',
                    'deputy head teacher',
                    'dean of students',
                ]
            ],

            [
                'permission' => 'verify student',
                'roles' => [
                    'super admin',
                    'admin',
                    'verifier admissions',
                ]
            ],
            [
                'permission' => 'create student bulk',
                'roles' => [
                    'super admin',
                    'admin',
                    'maker admissions',
                ]
            ],
            [
                'permission' => 'create teacher',
                'roles' => [
                    'super admin',
                    'admin',
                    'maker admissions',
                ]
            ],
            [
                'permission' => 'create support staff',
                'roles' => [
                    'super admin',
                    'admin',
                    'maker admissions',
                    'hr admissions maker',
                ]
            ],
            [
                'permission' => 'read teacher',
                'roles' => [
                    'super admin',
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
                    'super admin',
                    'admin',
                    'maker admissions',
                    'verifier admissions',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'delete teacher',
                'roles' => [
                    'super admin',
                    'admin',
                    'verifier admissions',
                    'head teacher',
                ]
            ],
            [
                'permission' => 'verify teacher',
                'roles' => [
                    'super admin',
                    'admin',
                    'verifier admissions',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'create guardian',
                'roles' => [
                    'super admin',
                    'admin',
                    'maker admissions',
                ]
            ],
            [
                'permission' => 'read guardian',
                'roles' => [
                    'super admin',
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
                    'super admin',
                    'admin',
                    'maker admissions',
                    'verifier admissions',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'delete guardian',
                'roles' => [
                    'super admin',
                    'admin',
                    'verifier admissions',
                    'head teacher',
                ]
            ],
            [
                'permission' => 'verify guardian',
                'roles' => [
                    'super admin',
                    'admin',
                    'verifier admissions',
                    'dean of students',
                ]
            ],
            [
                'permission' => 'make procurement request',
                'roles' => [
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                'permission' => 'create procurement bid',
                'roles' => [
                    'super admin',
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
                    'super admin',
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
                    'super admin',
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
                    'super admin',
                    'admin',
                    'guardian',
                ]
            ],
        ];
//
        foreach ($permissions as $permission) {
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
            \App\User::create([
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'info@furahacapital.com'
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
