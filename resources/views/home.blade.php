@extends('layout')
    @section('title', 'Přehrávač písní')
    @section('links')
    <link rel="stylesheet" href="{{asset('css/player.css')}}">
    @endsection
    @section('content')
<body>
    @include('navbar')
    <h1>Přehrávač taneční hudby</h1>
    <i>glg</i>
    <button class="button"><a href="{{route('playlist.list')}}">Seznam Playlistů</a></button>
    @include('player')
</body>
@endsection