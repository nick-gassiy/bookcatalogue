@extends('layout.app')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>{{$author->name . ' ' . $author->surname}}</h1>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td><h2>Название книги</h2></td>
                                    <td><h2>Жанры</h2></td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->name}}</td>
                                    <td>
                                        @foreach($book->genres()->get() as $genre)
                                            <a href = '{{route('genre.all.books',$genre->id)}}'>
                                                {{$genre->name}}
                                            </a>
                                            <br>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
