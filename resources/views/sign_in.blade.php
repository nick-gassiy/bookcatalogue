<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="main">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-form">
                    <h2 class="form-title">Sign in</h2>
                    <form method="POST" class="register-form" id="login-form" action="{{route('sign.in.submit')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-user"></i></label>
                            <input type="string" name="name" id="name" placeholder="Имя пользователя"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Пароль"/>
                        </div>
                        <div class="form-group form-button">
                            <button type="submit" name="signin" id="signin" class="form-submit" >Войти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
