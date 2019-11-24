<?php

use Illuminate\Database\Seeder;

class LoginUserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ashish',
            'email' => 'admin'.'@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
