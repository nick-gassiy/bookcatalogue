<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>Каталог книг</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/font-awesome.min.css" rel="stylesheet">
        <link href="/css/templatemo_style.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/templatemo_misc.css">
        <link rel="stylesheet" href="resources/css/styles.css">
        <link rel="stylesheet" href="/css/nivo-slider.css">
        <link rel="stylesheet" href="/css/slimbox2.css" type="text/css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
    </head>
<body>
<header>
    <div id="templatemo_home">
        <div class="templatemo_top">
            <div class="container templatemo_container">
                <div class="row">
                    <div class="col-sm-9 col-md-9 templatemo_col9">
                        <div id="top-menu">
                            <nav class="mainMenu">
                                <ul class="nav">
                                    <li><a class="menu" href="{{route('all.books')}}">Домой</a></li>
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                            <li><a class="menu" href="{{route('admin.all.books')}}">Книги</a></li>
                                            <li><a class="menu" href="{{route('admin.all.genres')}}">Жанры</a></li>
                                            <li><a class="menu" href="{{route('admin.all.authors')}}">Авторы</a></li>
                                            <li><a class="menu">{{auth()->user()->name}}</a></li>
                                            <li><a class="menu" href="{{route('logout')}}">Выйти</a></li>
                                    @else
                                        <li><a class="menu" href="{{route('sign.in')}}">Вход</a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>

</header>
<br>
<br>

@yield('content')

<br>
<br>
<br>


</body>
</html>
