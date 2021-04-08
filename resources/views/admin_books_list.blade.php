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
                        <table class="table table-hover">

                                <button type="submit" class="btn btn-primary btn-ld" role="button" name ="deny" value="deny" >
                                    <a href="{{route('admin.create.book')}}" style="color: white" >Создать книгу</a>
                                </button>


                            <thead>
                                <tr>
                                    <td><h2>Название книги</h2></td>
                                    <td><h2>Автор</h2></td>
                                    <td><h2>Жанры</h2></td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->name}}</td>
                                    <td>
                                        @foreach($book->authors()->get() as $author)
                                            <form method="POST" id="deny-genre" action="{{route('admin.delete.book.author',[$book->id,$author->id])}}">
                                                @csrf
                                            {{$author->name . ' ' . $author->surname}}
                                            <button type="submit" class="btn btn-danger pull-right btn-sm" role="button" name ="deny" value="deny" >Удалить</button>
                                            </form>
                                            <br>
                                            <br>
                                        @endforeach
                                            <br>
                                    </td>
                                    <td>
                                        @foreach($book->genres()->get() as $genre)
                                            <form method="POST" id="deny-genre" action="{{route('admin.delete.book.genre',[$book->id,$genre->id])}}">
                                                @csrf
                                                {{$genre->name}}
                                                <button type="submit" class="btn btn-danger pull-right  btn-sm" role="button" name ="deny" value="deny" >Удалить</button>
                                            </form>
                                            <br>
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <form method="POST" id="deny-genre" action="{{route('admin.delete.book',$book->id)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger  btn-ld" role="button" name ="deny" value="deny" >
                                            Удалить книгу
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="GET" id="deny-genre" action="{{route('admin.edit.book',$book->id)}}">
                                            @csrf
                                        <button type="submit" class="btn btn-primary btn-ld" role="button" name ="deny" value="deny" >
                                            Изменить книгу
                                        </button>
                                        </form>
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
