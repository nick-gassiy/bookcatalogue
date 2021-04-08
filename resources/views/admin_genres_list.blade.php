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
                        <div>
                            <form method="POST" id="accept-book" action="{{route('admin.add.genre')}}">
                                @csrf
                                    <input id="genre" type="string" name="genre" class="form-control-sm"  required="required" >
                                        <button type="submit" name ='send' id="send" class="btn btn-success btn-send pt-2 btn-sm" >
                                            Добавить жанр
                                        </button>
                            </form>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td><h3>Жанры</h3></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($genres as $genre)
                                <tr>
                                    <form method="POST" id="accept-book" action="{{route('admin.update.genre',$genre->id)}}">
                                        @csrf
                                        <td><input id="change_genre" type="string" name="change_genre" class="form-control-sm"  required="required" value="{{$genre->name}}"></td>
                                        <td>
                                            <button type="submit" name ='send' id="send" class="btn btn-success btn-send pt-2 btn-sm " >
                                            Изменить жанр
                                            </button>
                                        </td>
                                    </form>

                                    <form method="POST" id="deny-book" action="{{route('admin.delete.genre',$genre->id)}}">
                                        @csrf
                                        <td><button type="submit" class="btn btn-danger btn-sm" role="button" name ="deny" value="deny" >Удалить</button></td>
                                    </form>
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
