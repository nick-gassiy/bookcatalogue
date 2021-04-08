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
                        <h1>{{$genre->name}}</h1>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td><h2>Название книги</h2></td>
                                    <td><h2>Автор</h2></td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->name}}</td>
                                    <td>
                                        @foreach($book->authors()->get() as $author)
                                            <a href = '{{route('author.all.books',$author->id)}}'>
                                                {{$author->name . ' ' . $author->surname}}
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
