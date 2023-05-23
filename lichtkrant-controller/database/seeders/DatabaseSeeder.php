<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;


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
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@admin.nl',
            'password' => Hash::make('admin'),
            'admin' => true,
        ]);

        DB::table('textPresets')->insert([
            'text' => 'Hello World!',
            'colour' => '4AF626',
            'user_id' => null,
            'private' => false,
        ]);

        DB::table('modes')->insert([
            ['name' => 'Handmatig'],
            ['name' => 'Quotes'],
            ['name' => 'Temperatuur'],
            ['name' => 'Tijd'],
        ]);

        DB::table('current')->insert([
            'text' => 'Hello World!',
            'colour' => '4AF626',
            'mode' => 1,
        ]);

        DB::table('weather')->insert([
            'temperature' => 21,
            'humidity' => 75,
        ]);
    }
}
