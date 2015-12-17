<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $this->call('UserTableSeeder');
        $this->call('UserTypeTableSeeder');
        $this->call('CategoryTableSeeder');

        $this->command->info('User table seeded!');

        Model::reguard();
    }


}


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'firstname'  =>  'Admin',
            'email' => 'foo@bar.com',
            'password'  =>  bcrypt('123456'),
            'type_id'   =>  2
            ]);

        DB::table('users')->insert([
            'firstname'  =>  'Instructor',
            'email' => 'instructor@bar.com',
            'password'  =>  bcrypt('123456'),
            'type_id'   =>  2
            ]);

        DB::table('users')->insert([
            'firstname'  =>  'Student1',
            'email' => 'student1@bar.com',
            'password'  =>  bcrypt('123456'),
            'type_id'   =>  3
            ]);
        DB::table('users')->insert([
            'firstname'  =>  'Student2',
            'email' => 'student2@bar.com',
            'password'  =>  bcrypt('123456'),
            'type_id'   =>  3
            ]);
    }

}

class UserTypeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('user_types')->delete();

        DB::table('user_types')->insert([
            'id'    =>  1,
            'type_name' =>  'Admin'
            ]);

        DB::table('user_types')->insert([
            'id'    =>  2,
            'type_name' =>  'Instructor'
            ]);

         DB::table('user_types')->insert([
            'id'    =>  3,
            'type_name' =>  'Student'
            ]);
    }

}

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert([
            'id'    =>  1,
            'cate_name' =>  'Programming'
            ]);

        DB::table('categories')->insert([
            'id'    =>  2,
            'cate_name' =>  'Designer'
            ]);

         DB::table('categories')->insert([
            'id'    =>  3,
            'cate_name' =>  'Other'
            ]);
    }

}
