@extends('layout')
    @section('title', 'Seznam Playlistů')
    @section('content')
<body>
    <h1>Seznam Playlistů</h1>
    <ul>
        @foreach($playlists as $playlist)
            <li><a href="{{ route('playlist.view', $playlist->name) }}">{{ $playlist->name }} - {{ $playlist->type }}</a></li>
        @endforeach
    </ul>
    @if(session('is_admin'))
        <button class="button"><a href="{{ route('playlist.add') }}">Přidat playlist</a></button>
    @endif
</body>
</html>
@endsection