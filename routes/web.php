<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sign-in', 'App\Http\Controllers\UserController@signIn')->name('sign.in');
Route::post('/sign-in/submit','App\Http\Controllers\UserController@signInSubmit')->name('sign.in.submit');
Route::get('/logout','App\Http\Controllers\UserController@logout')->name('logout');

Route::get('/', 'App\Http\Controllers\BookController@allBooks')->name('all.books');
Route::get('/genre/{id}', 'App\Http\Controllers\GenreController@booksList')->name('genre.all.books');
Route::get('/author/{id}', 'App\Http\Controllers\AuthorController@booksList')->name('author.all.books');

Route::group(['middleware' => 'admin'] ,function(){
    Route::get('/admin/all/books','App\Http\Controllers\BookController@allBooksList')->name('admin.all.books');
    Route::get('/admin/all/genres','App\Http\Controllers\GenreController@allGenresList')->name('admin.all.genres');
    Route::get('/admin/all/authors','App\Http\Controllers\AuthorController@allAuthorsList')->name('admin.all.authors');

    Route::post('/admin/add/genre','App\Http\Controllers\GenreController@addGenre')->name('admin.add.genre');
    Route::post('/admin/delete/genre/{id}','App\Http\Controllers\GenreController@deleteGenre')->name('admin.delete.genre');
    Route::post('/admin/update/genre/{id}','App\Http\Controllers\GenreController@updateGenre')->name('admin.update.genre');

    Route::post('/admin/add/author','App\Http\Controllers\AuthorController@addAuthor')->name('admin.add.author');
    Route::post('/admin/delete/author/{id}','App\Http\Controllers\AuthorController@deleteAuthor')->name('admin.delete.author');
    Route::post('/admin/update/author/{id}','App\Http\Controllers\AuthorController@updateAuthor')->name('admin.update.author');

    Route::post('/admin/delete/book/{book_id}/genre/{genre_id}','App\Http\Controllers\BookController@deleteBookGenre')->name('admin.delete.book.genre');
    Route::post('/admin/delete/book/{book_id}/author/{author_id}','App\Http\Controllers\BookController@deleteBookAuthor')->name('admin.delete.book.author');
    Route::post('/admin/delete/book/{book_id}','App\Http\Controllers\BookController@deleteBook')->name('admin.delete.book');
    Route::get('/admin/edit/book/{id}','App\Http\Controllers\BookController@editBook')->name('admin.edit.book');
    Route::post('/admin/update/book/{book_id}','App\Http\Controllers\BookController@updateBook')->name('admin.update.book');
    Route::get('/admin/create/book/','App\Http\Controllers\BookController@newBook')->name('admin.create.book');
    Route::post('/admin/create/book/submit','App\Http\Controllers\BookController@createBook')->name('admin.create.book.submit');

});





