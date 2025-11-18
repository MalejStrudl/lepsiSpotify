<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Seznam Playlistů</h1>
    <ul>
        @foreach($playlists as $playlist)
            <li><a href="{{ route('playlist.view', $playlist->name) }}">{{ $playlist->name }} - {{ $playlist->type }}</a></li>
        @endforeach
    </ul>
    <a href="{{ route('playlist.add') }}">Přidat playlist</a>
</body>
</html>