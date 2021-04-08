<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function allBooks()
    {
        $books = Book::all();
        return view('all_books',compact('books'));
    }

    public function allBooksList()
    {
        $books = Book::all();
        return view('admin_books_list',compact('books'));
    }

    public function deleteBookGenre($book_id,$genre_id)
    {
        $genreBook = DB::table('genre_book')->where('book_id',$book_id)->where('genre_id',$genre_id);
        $genreBook->delete();
        return redirect()->back();
    }

    public function deleteBookAuthor($book_id,$author_id)
    {
        $bookAuthor = DB::table('author_book')->where('book_id',$book_id)->where('author_id',$author_id);
        $bookAuthor->delete();
        return redirect()->back();
    }

    public function deleteBook($book_id)
    {
        $book = Book::find($book_id);
        $book->authors()->detach();
        $book->genres()->detach();
        $book->delete();
        return redirect()->back();
    }

    public function editBook($id)
    {
        $book=Book::find($id);
        return view('admin_book_edit',compact('book'));
    }

    public function updateBook(Request $request,$book_id)
    {
        $book=Book::find($book_id);
        $book->name = $request->input('change_name');
        $authorRequest = $request->input('choose_author');
        if($authorRequest != null)
        {
            $splitName = explode(' ', $authorRequest, 2);
            $author = Author::where('name', $splitName[0])->where('surname',$splitName[1])->pluck('id')->first();
            DB::table('author_book')
                ->insert(['book_id'=>$book_id,
                    'author_id' => $author]);
        }
        $genreRequest = $request->input('choose_genre');
        if($genreRequest != null){
            $genre=Genre::where('name',$genreRequest)->pluck('id')->first();

            DB::table('genre_book')
                ->insert(['book_id' => $book_id,
                    'genre_id' => $genre]);
        }
        $book->save();
        return redirect()->route('all.books');
    }

    public function newBook(){
        return view('admin_book_new');
    }

    public function createBook(Request $request)
    {
        $book = new Book();
        $book->name = $request->input('name');
       $path = $request->file('image');
       $path->storeAs('uploads',$path->getClientOriginalName(),'public');
       $book->photo_path = $path->getClientOriginalName();
       $book->save();
       $authorRequest = $request->input('choose_author');
        if($authorRequest != null)
        {
            $splitName = explode(' ', $authorRequest, 2);
            $author = Author::where('name', $splitName[0])->where('surname',$splitName[1])->pluck('id')->first();
            DB::table('author_book')
                ->insert(['book_id'=>$book->id,
                    'author_id' => $author]);
        }
        $genreRequest = $request->input('choose_genre');
        if($genreRequest != null){
            $genre=Genre::where('name',$genreRequest)->pluck('id')->first();

            DB::table('genre_book')
                ->insert(['book_id' => $book->id,
                    'genre_id' => $genre]);
        }

       return redirect()->route('all.books');
    }
}
