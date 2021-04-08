@extends('layout.app')
@section('content')
<div class="container">
    <div class="row d-flex align-items-stretch" style="margin:60px">
        @foreach($books as $book)
            <div class="col-sm-6 col-md-4 ">
                <div class="thumbnail" style="height:auto;position:relative">
                    <div style="height: 150px">
                    <h2>{{$book->name}}</h2>
                    @php($bookAuthors = $book->authors()->get())
                    @foreach($bookAuthors as $author)
                        <a href = '{{route('author.all.books',$author->id)}}'>
                            <p>{{$author->name . ' ' . $author->surname}}</p>
                        </a>
                    @endforeach
                    @php($bookGenres = $book->genres()->get())
                    @foreach($bookGenres as $genre)
                        <a href = '{{route('genre.all.books',$genre->id)}}'>
                            <span>{{$genre->name . ' '}}</span>
                        </a>
                    @endforeach
                    </div>
                        <img class = 'img-fluid' src="{{asset('/storage/uploads/' . $book->photo_path)}}" style="height:400px" >

                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
