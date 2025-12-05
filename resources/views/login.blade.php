@extends('layout')
    @section('title', 'Přihlásit se')
    @section('links')
    <link rel="stylesheet" href="{{asset('/css/login.css')}}">
    @endsection
    @section('content')
<body>
    @include('navbar')
    <header>
        <h1>Přihlásit se</h1>
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="form-content">
                <label for="email">E-mail:</label>
                <input type="email" name="email" placeholder="e-mail">
                <label for="password">Heslo:</label>
                <input type="password" name="password" placeholder="heslo">
            </div>
            <button type="submit">Přihlásit se</button>
        </form>
    <a href="{{route('register')}}">Nemáte účet? Zaregistrujte se</a>
    </header>
</body>
    @endsection