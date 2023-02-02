<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
                'id' => 1,
                'code' => 'uz',
            ],
            [
                'id' => 2,
                'code' => 'ru',
            ],
            [
                'id' => 3,
                'code' => 'en',
            ]
        ]);
    }
}
