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
        DB::table('users')->insert([
            'name'      => 'Gilto',
            'email'     => 'barcellagilto@gmail.com',
            'password'  => bcrypt('@Elixir10'),
            'role'      => 'admin',
        ]);
    }
}
