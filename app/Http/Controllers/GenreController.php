<?php

namespace App\Http\Controllers;



use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;


class GenreController extends Controller
{
    public function booksList($id)
    {
        $genre = Genre::find($id);
        $genreBooks = $genre->books()->get();
        $books = Book::whereIn('id',$genreBooks->pluck('id'))->get();
        return view('genre',compact('genre','books'));
    }

    public function allGenresList()
    {
        $genres = Genre::all();
        return view('admin_genres_list',compact('genres'));
    }

    public function addGenre(Request $request)
    {
        $genre = new Genre();
        $genre->name = $request->input('genre');
        $genre->save();
        return redirect()->back();
    }

    public function deleteGenre(Request $request,$id)
    {
        $genre = Genre::findOrFail($id);
        $genre->books()->delete();
        $genre->delete();
        return redirect()->back();
    }

    public function updateGenre(Request $request,$id)
    {
        $genre = Genre::findOrFail($id);
        $genre->name = $request->input('change_genre');
        $genre->save();
        return redirect()->back();
    }
}
