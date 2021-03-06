<?php

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

        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name'=> 'Admin',
            'email'=> 'admin@admin.admin',
            'password'=>bcrypt('admin'),
            'is_admin'=>1,
            'email_verified_at'=>'2020-07-07 14:04:22'
        ]);
    }
}
