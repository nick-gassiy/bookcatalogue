@extends('layout.app')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <form method="POST" id="deny-genre" action="{{route('admin.update.book',$book->id)}}">
        @csrf
            <div class="container">
                <h2>Название книги</h2>
                    <input id="change_name" type="string" name="change_name" class="form-control-sm"  required="required" value="{{$book->name}}">
                <br>
                <br>
                @foreach($book->authors()->get() as $author)
                        {{$author->name . ' ' . $author->surname}}
                    <br><br>
                @endforeach
                <h2>Автор</h2>
                    <select id="choose_author" name="choose_author" class="form-control" data-error="Виберете автора">
                        <option value="" selected disabled>Добавить автора</option>
                        @foreach(\App\Models\Author::all() as $author)
                            <option>
                                {{$author->name . ' ' . $author->surname}}
                            </option>
                        @endforeach
                    </select>
                <h2>Жанр</h2>
                @foreach($book->genres()->get() as $genre)
                    {{$genre->name}}
                @endforeach

                    <select id="choose_genre" name="choose_genre" class="form-control" data-error="Виберете жанр">
                        <option selected disabled>Добавить жанр</option>
                        @foreach(\App\Models\Genre::all() as $genre)
                            <option>
                                {{$genre->name}}
                            </option>
                        @endforeach
                    </select>
                <button type="submit" name ='send' id="send" class="btn btn-success btn-send pt-2 btn-ld"  >
                    Сохранить
                </button>
            </div>
    </form>

@endsection




