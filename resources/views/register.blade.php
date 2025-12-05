@extends('layout')
    @section('title', 'Zaregistrovat se')
    @section('links')
    <link rel="stylesheet" href="{{asset('/css/login.css')}}">
    @endsection
    @section('content')
<body>
    @include('navbar')
    <header>
        <h1>Zaregistrovat se</h1>
    <form action="{{route('registerPost')}}" method="POST">
        @csrf
        <div class="form-content">
            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="e-mail">
            <label for="password">Heslo:</label>
            <input type="password" name="password" placeholder="heslo">
            <label for="password">Potvrďte heslo:</label>
            <input type="password" name="password_confirmation" placeholder="potvrďte heslo">
        </div>
        <button type="submit">Zaregistrovat</button>
    </form>
    <a href="{{route('login')}}">Přihlásit se</a>
    </header>
</body>
@endsection