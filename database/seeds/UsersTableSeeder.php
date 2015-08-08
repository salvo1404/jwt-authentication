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
        DB::table('users')->delete();

        $users = [
            [
                'first_name'     => 'App',
                'last_name'      => 'Devs',
                'email'          => 'appdevs@3rdsense.com',
                'password'       => Hash::make('Password1'),
                'is_active'         => true,
                'remember_token' => null,
                'created_at'     => new DateTime,
                'updated_at'     => new DateTime,
            ],
            [
                'first_name'     => 'Salvatore',
                'last_name'      => 'Balzano',
                'email'          => 'salvatore@3rdsense.com',
                'password'       => Hash::make('Password1'),
                'is_active'         => true,
                'remember_token' => null,
                'created_at'     => new DateTime,
                'updated_at'     => new DateTime,
            ],
        ];

        DB::table('users')->insert($users);
    }
}
