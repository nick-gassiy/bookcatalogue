<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booksAuthorsId = [
          [1,4],
          [1,5],
          [2,1],
          [3,3],
        ];

        foreach ($booksAuthorsId as $bookAuthorId){
            DB::table('author_book')->insert([
                'book_id'=>$bookAuthorId[0],
                'author_id'=>$bookAuthorId[1]
            ]);
        }
    }
}
