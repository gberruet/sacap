<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Student;
use App\StudentType;
use App\Nationality;
use App\DocumentType;
use App\Category;
use App\SacapPermission\Models\Role;
use App\SacapPermission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SacapPermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate tables
        DB::statement("SET foreign_key_checks=0");
            DB::table('role_user')->truncate();
            DB::table('permission_role')->truncate();
            Permission::truncate();
            Role::truncate();
            StudentType::truncate();
            Nationality::truncate();
            DocumentType::truncate();
            Category::truncate();
        DB::statement("SET foreign_key_checks=1");

        StudentType::create([
           'name' => 'Student'
        ]);
        StudentType::create([
            'name' => 'Teacher'
        ]);
        StudentType::create([
            'name' => 'Investigator'
        ]);
        StudentType::create([
            'name' => 'Other'
        ]);

        Nationality::create([
           'name' => 'Argentina'
        ]);
        Nationality::create([
            'name' => 'Foreign'
        ]);
        Nationality::create([
            'name' => 'Naturalized'
        ]);
        Nationality::create([
            'name' => 'By option'
        ]);

        DocumentType::create([
           'name' => 'DNI',
        ]);
        DocumentType::create([
            'name' => 'CEDULA DE IDENTIDAD',
        ]);
        DocumentType::create([
            'name' => 'PASAPORTE',
        ]);

        Category::create([
           'name' => 'ACTIVIDADES ABIERTAS CARRERAS DE POSTGRADO',
           'code' => 'AACP',
        ]);

        Category::create([
            'name' => 'ACTIVIDADES DE POSTGRADO',
            'code' => 'AP',
        ]);

        Category::create([
            'name' => 'DOCTORADO',
            'code' => 'DOC',
        ]);

        Category::create([
            'name' => 'ESPECIALIZACIÓN',
            'code' => 'ESP',
        ]);

        Category::create([
            'name' => 'MAESTRÍA',
            'code' => 'MAEST',
        ]);

        Category::create([
            'name' => 'PROGRAMA DE POSGRADO',
            'code' => 'PP',
        ]);

        Category::create([
            'name' => 'REZAGADOS ARQUITECTURA Y HABITAT SUSTENTABLE',
            'code' => 'RAYHS',
        ]);

        //user admin
        $useradmin = User::where('email','admin@sacap.com')->first();
        if ($useradmin){
            $useradmin->delete();
        }
        $useradmin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@sacap.com',
            'password'  => Hash::make('12345678')
        ]);

        //user postgraduate
        $userpostgraduate = User::where('email','postgraduate@sacap.com')->first();
        if ($userpostgraduate){
            $userpostgraduate->delete();
        }
        $userpostgraduate = User::create([
            'name'      => 'Postgraduate',
            'email'     => 'postgraduate@sacap.com',
            'password'  => Hash::make('12345678')
        ]);

        //user accountancy
        $useraccountancy = User::where('email','accountancy@sacap.com')->first();
        if ($useraccountancy){
            $useraccountancy->delete();
        }
        $useraccountancy = User::create([
            'name'      => 'Accountancy',
            'email'     => 'accountancy@sacap.com',
            'password'  => Hash::make('12345678')
        ]);

        //user teacher
        $userteacher = User::where('email','teacher@sacap.com')->first();
        if ($userteacher){
            $userteacher->delete();
        }
        $userteacher = User::create([
            'name'      => 'Teacher',
            'email'     => 'teacher@sacap.com',
            'password'  => Hash::make('12345678')
        ]);

        //user student
        $userstudent1 = User::where('email','student@sacap.com')->first();
        if ($userstudent1){
            $userstudent1->delete();
        }
        $userstudent1 = User::create([
            'name'      => 'Student',
            'email'     => 'student@sacap.com',
            'password'  => Hash::make('12345678')
        ]);

        //user student
        $userstudent = Student::where('email','student@sacap.com')->first();
        if ($userstudent){
            $userstudent->delete();
        }

        $userstudent = Student::create([
            'first_name'        => 'Student',
            'last_name'         => 'Test',
            'student_type_id'   => 1,
            'nationality_id'    => 1,
            'document_type_id'  => 1,
            'document_number'   => '12345678',
            'file_number'       => '12345678',
            'phone_number'      => '12345678',
            'email'             => 'student@sacap.com',
        ]);

        //role admin
        $roladmin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrator',
            'full-access' => 'yes',
        ]);

        //role Registered User
        $rolpostgraduate = Role::create([
            'name' => 'Postgraduate',
            'slug' => 'postgraduate',
            'description' => 'Postgraduate User',
            'full-access' => 'yes',
        ]);

        $rolaccountancy = Role::create([
            'name' => 'Accountancy',
            'slug' => 'accountancy',
            'description' => 'Accountancy User',
            'full-access' => 'no',
        ]);

        $rolteacher = Role::create([
            'name' => 'Teacher',
            'slug' => 'teacher',
            'description' => 'Teacher User',
            'full-access' => 'no',
        ]);

        $rolstudent = Role::create([
            'name' => 'Student',
            'slug' => 'student',
            'description' => 'Student User',
            'full-access' => 'no',
        ]);

        //table role_user
        $useradmin->roles()->sync([ $roladmin->id ]);
        $userpostgraduate->roles()->sync([ $rolpostgraduate->id ]);
        $useraccountancy->roles()->sync([ $rolaccountancy->id ]);
        $userteacher->roles()->sync([ $rolteacher->id ]);
        $userstudent1->roles()->sync([ $rolstudent->id ]);

        //permission
        $permission_all = [];

        //permission role
        $permission = Permission::create([
            'name' => 'List role',
            'slug' => 'role.index',
            'description' => 'A user can list role',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show role',
            'slug' => 'role.show',
            'description' => 'A user can see role',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Create role',
            'slug' => 'role.create',
            'description' => 'A user can create role',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit role',
            'slug' => 'role.edit',
            'description' => 'A user can edit role',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy role',
            'slug' => 'role.destroy',
            'description' => 'A user can destroy role',
        ]);
        $permission_all[] = $permission->id;

        //permission user
        $permission = Permission::create([
            'name' => 'List user',
            'slug' => 'user.index',
            'description' => 'A user can list user',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show user',
            'slug' => 'user.show',
            'description' => 'A user can see user',
        ]);
        $permission_all[] = $permission->id;
        /*
        $permission = Permission::create([
            'name' => 'Create user',
            'slug' => 'user.create',
            'description' => 'A user can create user',
        ]);
        $permission_all[] = $permission->id;
        */

        $permission = Permission::create([
            'name' => 'Edit user',
            'slug' => 'user.edit',
            'description' => 'A user can edit user',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy user',
            'slug' => 'user.destroy',
            'description' => 'A user can destroy user',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show own user',
            'slug' => 'userown.show',
            'description' => 'A user can see own user',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit own user',
            'slug' => 'userown.edit',
            'description' => 'A user can edit own user',
        ]);
        $permission_all[] = $permission->id;

        //permission student
        $permission = Permission::create([
            'name' => 'List student',
            'slug' => 'student.index',
            'description' => 'A user can list student',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show student',
            'slug' => 'student.show',
            'description' => 'A user can see student',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Create student',
            'slug' => 'student.create',
            'description' => 'A user can create student',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit student',
            'slug' => 'student.edit',
            'description' => 'A user can edit student',
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy student',
            'slug' => 'student.destroy',
            'description' => 'A user can destroy student',
        ]);
        $permission_all[] = $permission->id;

        //table premission_role
        //$roladmin->permissions()->sync( $permission_all );

    }
}
