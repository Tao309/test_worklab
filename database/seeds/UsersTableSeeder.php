<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];

        $users[] = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ];

        for($i = 1; $i <= 20; $i++)
        {
            $users[] = [
                'name' => 'user'.$i,
                'email' => 'user'.$i.'@gmail.com',
                'password' => bcrypt('123456')
            ];
        }

        DB::table('users')->insert($users);
    }
}
