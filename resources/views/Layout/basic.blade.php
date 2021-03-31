
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    @if(session()->get('company'))
        <div class="success alert-success text-center">Вы вошли как: {{ session()->get('company')['name'] }}</div>
    @endif
    <div class="container">
        <section id="auth" class="my-3 row">
                @if(session()->get('company'))
                    <div class="col"></div>
                    <form action='{{route('logout')}}' method="post" class="col-12 col-sm-10 col-md-8 col-lg-4">
                        @csrf
                        <div class="w-100 text-center">
                            <button type="submit" name="logOut" class="btn btn-danger">Выйти</button>
                        </div>
                    </form>
                    <div class="col"></div>
                @else
                    <div class="col"></div>
                    <form action='{{route('login')}}' method="post" class="col-12 col-sm-10 col-md-8 col-lg-4">
                        @csrf
                        <div class="form-group">
                            <label for="InputLogin">Логин</label>
                            <input type="text" name="login" required class="form-control" id="InputLogin" placeholder="Введите логин">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">Пароль</label>
                            <input type="password" name="password" autocomplete="on" required class="form-control" id="InputPassword" placeholder="Пароль">
                        </div>
                        <div class="w-100 text-center">
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </div>
                    </form>
                    <div class="col"></div>
                @endif
        </section>
         @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
	    @endif

        <section id="content">
            @yield('content')
        </section>
    </div>
</body>
</html>