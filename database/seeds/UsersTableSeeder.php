<?php

use App\Models\User;
use App\Models\Employee;
use App\Models\Student;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('employee')->delete();
        DB::table('student')->delete();

        /*  Admin/OIC
         * ========================= */

        // Users Table
        $user = new User;
        $user->id = 1;
        $user->first_name = 'Admin';
        $user->last_name = 'Admin';
        $user->gender = 'M';
        $user->username = 'uniadmin';
        $user->password = Hash::make('uniadmin');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('admin', 'super admin');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K200';
        $employee->user_id = 1;
        $employee->save();

        /*  Head Registrar
         * ========================= */

        // Users Table
        $user = new User;
        $user->id = 3;
        $user->profile_picture = 'K002.jpg';
        $user->first_name = 'Annabeth';
        $user->middle_name = 'Chase';
        $user->last_name = 'Jackson';
        $user->gender = 'F';
        $user->username = 'K002';
        $user->password = Hash::make('K002');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('head registrar');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K002';
        $employee->user_id = 3;
        $employee->save();

        /* Registrar
         * ========================= */

        // Users Table
        $user = new User;
        $user->id = 4;
        $user->profile_picture = 'K003.jpg';
        $user->first_name = 'Harry';
        $user->middle_name = 'Potter';
        $user->last_name = 'Bacon';
        $user->gender = 'M';
        $user->username = 'K003';
        $user->password = Hash::make('K003');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('registrar');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K003';
        $employee->user_id = 4;
        $employee->save();

        /* Faculty
         * ========================= */

        // Users Table
        $user = new User;
        $user->id = 5;
        $user->profile_picture = 'K004.jpg';
        $user->first_name = 'Lucy';
        $user->last_name = 'Violet';
        $user->gender = 'F';
        $user->username = 'K004';
        $user->password = Hash::make('K004');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty', 'moderator', 'writer');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K004';
        $employee->user_id = 5;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->id = 6;
        $user->profile_picture = 'K005.jpg';
        $user->first_name = 'Rofer';
        $user->last_name = 'Woof';
        $user->gender = 'M';
        $user->username = 'K005';
        $user->password = Hash::make('K005');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty', 'writer');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K005';
        $employee->user_id = 6;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->id = 7;
        $user->profile_picture = 'K006.jpg';
        $user->first_name = 'Evan';
        $user->last_name = 'Runner';
        $user->gender = 'M';
        $user->username = 'K006';
        $user->password = Hash::make('K006');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('faculty');

        // Employee Table
        $employee = new Employee;
        $employee->employee_no = 'K006';
        $employee->user_id = 7;
        $employee->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '042030001.jpg';
        $user->first_name = 'Red';
        $user->middle_name = 'Dober';
        $user->last_name = 'Woof';
        $user->birthdate = '1998-08-06';
        $user->address = 'Tondo, Manila';
        $user->username = '042030001';
        $user->password = Hash::make('042030001');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '042030001';
        $student->student_type = 'Regular';
        $student->primary = 'Doggy Elementary School';
        $student->primary_sy = '2003-2007';
        $student->intermediate = 'Doggy Elementary School';
        $student->intermediate_sy = '2007-2010';
        $student->secondary = 'Doggy High School';
        $student->secondary_sy = '2010-2015';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '202101';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '042030002.jpg';
        $user->first_name = 'Loise';
        $user->middle_name = 'Dela Cruz';
        $user->last_name = 'Ruiz';
        $user->gender = 'F';
        $user->birthdate = '1998-09-16';
        $user->address = 'Baker Street';
        $user->username = '042030002';
        $user->password = Hash::make('042030002');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '042030002';
        $student->student_type = 'Regular';
        $student->primary = 'All Girls Elementary School';
        $student->primary_sy = '2003-2007';
        $student->intermediate = 'All Girls Elementary School';
        $student->intermediate_sy = '2007-2010';
        $student->secondary = 'All Girls High School';
        $student->secondary_sy = '2010-2015';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '202101';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '042030003.jpg';
        $user->first_name = 'Steven';
        $user->middle_name = 'Riox';
        $user->last_name = 'Jackson';
        $user->gender = 'M';
        $user->birthdate = '1998-01-04';
        $user->address = 'Mendiola';
        $user->username = '042030003';
        $user->password = Hash::make('042030003');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '042030003';
        $student->student_type = 'Regular';
        $student->primary = 'Mendiola Science Elementary School';
        $student->primary_sy = '2003-2007';
        $student->intermediate = 'Mendiola Science Elementary School';
        $student->intermediate_sy = '2007-2010';
        $student->secondary = 'Mendiola Science High School';
        $student->secondary_sy = '2010-2015';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '202101';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '042030004.jpg';
        $user->first_name = 'Lea';
        $user->middle_name = 'Mandayaw';
        $user->last_name = 'Santiago';
        $user->gender = 'F';
        $user->birthdate = '1998-02-13';
        $user->address = 'Lacson Blvd';
        $user->username = '042030004';
        $user->password = Hash::make('042030004');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '042030004';
        $student->student_type = 'Regular';
        $student->primary = 'Lacson Elementary School';
        $student->primary_sy = '2004-2008';
        $student->intermediate = 'Lacson Elementary School';
        $student->intermediate_sy = '2008-2010';
        $student->secondary = 'Lacson High School';
        $student->secondary_sy = '2010-2015';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '202101';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '042030005.jpg';
        $user->first_name = 'Pea';
        $user->middle_name = 'Bird';
        $user->last_name = 'Rainbow';
        $user->birthdate = '1998-05-27';
        $user->address = 'Lacson Blvd';
        $user->username = '042030005';
        $user->password = Hash::make('042030005');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '042030005';
        $student->student_type = 'Regular';
        $student->primary = 'Lacson Elementary School';
        $student->primary_sy = '2004-2008';
        $student->intermediate = 'Lacson Elementary School';
        $student->intermediate_sy = '2008-2010';
        $student->secondary = 'Lacson High School';
        $student->secondary_sy = '2010-2015';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '202101';
        $student->user_id = $user->id;
        $student->save();

        /* ========================= */

        // Users Table
        $user = new User;
        $user->profile_picture = '042030006.jpg';
        $user->first_name = 'Rufus';
        $user->middle_name = 'El';
        $user->last_name = 'Dela Cruz';
        $user->birthdate = '1998-05-27';
        $user->address = 'Lacson Blvd';
        $user->username = '042030006';
        $user->password = Hash::make('042030006');
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        $user->assignRole('student');

        // Student Table
        $student = new Student;
        $student->student_no = '042030006';
        $student->student_type = 'Regular';
        $student->primary = 'Lacson Elementary School';
        $student->primary_sy = '2004-2008';
        $student->intermediate = 'Lacson Elementary School';
        $student->intermediate_sy = '2008-2010';
        $student->secondary = 'Lacson High School';
        $student->secondary_sy = '2010-2015';
        $student->curriculum_id = 2012;
        $student->acad_term_admitted_id = '202101';
        $student->user_id = $user->id;
        $student->save();
    }
}