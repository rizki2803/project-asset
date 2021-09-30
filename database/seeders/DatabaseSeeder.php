<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            'nik' => '12344',
            'name' => 'iki',
            'departemen' => 'informatika',
            'email' => 'rizkioi.rm@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => \Hash::make('12345678')

        ]);
        // \App\Models\User::factory(10)->create();
    }
}
