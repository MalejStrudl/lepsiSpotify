<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playlist</title>
</head>
<body>
    <h1>Songs in Playlist</h1>
    <ul>
        @foreach($songs as $song)
            <li><a class="niga" data-path="../../storage/app/public/{{$song->path}}">{{ $song->title }}</a><audio src="../../storage/app/public/{{$song->path}}" class="audio"></audio></li>
        @endforeach
    </ul>
</body>
<script src="../../resources/js/playmusic.js"></script>
</html>