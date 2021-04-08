@extends('layout.app')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <form method="POST" id="new-book" action="{{route('admin.create.book.submit')}}" enctype="multipart/form-data">
        @csrf
            <div class="container">
                    <h2>Название книги</h2>
                    <input id="name" type="string" name="name" class="form-control-sm"  required="required" >
                <br>
                <br>
                    <h2>Автор</h2>

                    <select id="choose_author" name="choose_author" class="form-control" data-error="Виберете автора">
                        <option value="" selected disabled >Добавить автора</option>
                        @foreach(\App\Models\Author::all() as $author)
                            <option>
                                {{$author->name . ' ' . $author->surname}}
                            </option>
                        @endforeach
                    </select>
                    <h2>Жанр</h2>

                    <select id="choose_genre" name="choose_genre" class="form-control" data-error="Виберете жанр">
                        <option selected disabled>Добавить жанр</option>
                        @foreach(\App\Models\Genre::all() as $genre)
                            <option>
                                {{$genre->name}}
                            </option>
                        @endforeach
                    </select>
                    <br>
                    <br>


                    <div class="form-group">
                        <input type="file" name="image">
                    </div>

                <button type="submit" name ='send' id="send" class="btn btn-success btn-send pt-2 btn-ld"  >
                    Сохранить
                </button>
            </div>
    </form>

@endsection




