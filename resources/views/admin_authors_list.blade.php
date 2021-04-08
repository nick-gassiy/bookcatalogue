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
                            <form method="POST" id="accept-book" action="{{route('admin.add.author')}}">
                                @csrf
                                <input id="name" type="string" name="name" class="form-control-sm"  required="required" placeholder="Имя">
                                <input id="surname" type="string" name="surname" class="form-control-sm"  required="required" placeholder="Фамилия">
                                <button type="submit" name ='send' id="send" class="btn btn-success btn-send pt-2 btn-sm" >
                                    Добавить автора
                                </button>
                            </form>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td><h2>Имя</h2></td>
                                    <td><h2>Фамилия</h2></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <form method="POST" id="accept-book" action="{{route('admin.update.author',$author->id)}}">
                                    @csrf
                                    <td><input id="change_name" type="string" name="change_name" class="form-control-sm"  required="required" value="{{$author->name}}"></td>
                                    <td><input id="change_surname" type="string" name="change_surname" class="form-control-sm"  required="required" value="{{$author->surname}}"></td>
                                    <td>
                                        <button type="submit" name ='send' id="send" class="btn btn-success btn-send pt-2 btn-sm" >
                                            Изменить
                                        </button>
                                    </td>
                                    </form>
                                    <form method="POST" id="deny-author" action="{{route('admin.delete.author',$author->id)}}">
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
