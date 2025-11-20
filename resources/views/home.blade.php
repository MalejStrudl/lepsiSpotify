@extends('layout')
    @section('title', 'Přehrávač písní')
    @section('content')
<body>
    <h1>Glg</h1>
    <button class="button"><a href="{{route('playlist.list')}}">Seznam Playlistů</a></button>
</body>
</html>
@endsection