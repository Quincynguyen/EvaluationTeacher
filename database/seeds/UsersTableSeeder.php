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
            'name' => "Quỳnh Nguyễn",
            'username' =>'665105052',
            'password' => Hash::make('665105052'),
        ]);
    }
}
