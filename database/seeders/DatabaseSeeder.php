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
        \App\Models\User::create([
            'name' => 'iki',
            'email' => 'rizkioi.rm@gmail.com',
            'password' => \Hash::make('12345678')

        ]);
        // \App\Models\User::factory(10)->create();
    }
}
