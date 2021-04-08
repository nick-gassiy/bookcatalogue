<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booksGenresId=[
          [1,5],
          [1,3],
          [2,9],
          [2,8],
          [2,7],
          [3,5],
          [3,1],
          [3,3],
          [3,4],
        ];

        foreach ($booksGenresId as $bookGenreId)
        {
            DB::table('genre_book')->insert([
                'book_id'=>$bookGenreId[0],
                'genre_id'=>$bookGenreId[1],
            ]);
        }
    }
}
