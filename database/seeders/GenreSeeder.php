<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            ['Фантастика'],
            ['Современная проза'],
            ['Приключения'],
            ['Мистика'],
            ['Юмор'],
            ['Ужасы'],
            ['Разное'],
            ['Романтика'],
            ['Драма'],
            ['Детектив'],
            ['Поэзия']
        ];
        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'name' => $genre[0]
            ]);
        }
    }
}
