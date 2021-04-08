<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function booksList($id)
    {
        $author = Author::find($id);
        $authorBooks = $author->books()->get();
        $books = Book::whereIn('id',$authorBooks->pluck('id'))->get();
        return view ('author',compact('author','books'));
    }

    public function allAuthorsList()
    {
        $authors = Author::all();
        return view('admin_authors_list',compact('authors'));
    }

    public function addAuthor(Request $request)
    {
        $author = new Author();
        $author->name = $request->input('name');
        $author->surname = $request->input('surname');
        $author->save();
        return redirect()->back();
    }


    public function deleteAuthor(Request $request,$id)
    {
        $author = Author::findOrFail($id);
        $author->books()->delete();
        $author->delete();
        return redirect()->back();
    }

    public function updateAuthor(Request $request,$id)
    {
        $author = Author::find($id);
        $author->name = $request->input('change_name');
        $author->surname = $request->input('change_surname');
        $author->save();
        return redirect()->back();
    }

}
