<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors =[
            ['Лев','Толстой'],
            ['Александр','Пушкин'],
            ['Николай','Гоголь'],
            ['Илья','Ильф'],
            ['Евгений','Петров'],
        ];
        foreach ($authors as $author)
        {
            DB::table('authors')->insert([
                'name' => $author[0],
                'surname'=>$author[1],
            ]);
        }
    }
}
