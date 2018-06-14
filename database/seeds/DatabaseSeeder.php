<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         'name' => "Victor",
         'email' => 'VictorMmendes.VM@gmail.com',
         'password' => bcrypt('120412'),
         'admin' => true,
        ]);

        DB::table('users')->insert([
         'name' => "Yuri",
         'email' => 'yuribacil@gmail.com',
         'password' => bcrypt('123123'),
         'admin' => true,
        ]);
    }
}
