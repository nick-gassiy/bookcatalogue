<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            ['12 Стульев'],
            ['Война и Мир'],
            ['Вечера на хуторе близ Диканьки'],
        ];

        foreach ($books as $book)
        {
            DB::table('books')->insert([
                'name' => $book[0],
            ]);
        }
    }
}
