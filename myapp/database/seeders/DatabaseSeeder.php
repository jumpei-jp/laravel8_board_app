<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //10人分のStudentのデータを入れる
        \App\Models\Student::factory(10)->create();

        $this->call([
            UsersTableSeeder::class, // User追加のseederを呼び出すように追加
        ]);
    }
}
