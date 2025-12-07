<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('img/glg.png')}}" type="image/x-icon">
    <title>@yield('title', 'Zvuk')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @yield('links')
</head>
    @yield('content')
    @if(session('username'))
    <a class="user">{{session('username')}}</a>
    <div class="user-div">
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="button-logout">Logout</button>
            
        </form>
    </div>
    @else
    <a class="user" href="{{route('login')}}">Přihlásit se</a>
    @endif
    <script src="{{asset('js/playmusic.js')}}"></script>
</html>