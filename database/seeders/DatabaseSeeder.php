<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Liem',
            'dob' => '2000-02-01',
            'gender' => 0,
            'email' => 'trinhdamhuy@gmail.com',
            'email_verified_at' => '2022-11-20 07:36:17',
            'password' => Hash::make('123123123'),
            'slug' => 'liem',
            'created_at' => '2022-11-23 17:46:24',
            'updated_at' => '2022-11-23 17:46:55',
        ]);

    }
}
