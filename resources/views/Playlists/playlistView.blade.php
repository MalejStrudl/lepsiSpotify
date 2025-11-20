    @extends('layout')
    @section('links')
    <link rel="stylesheet" href="../../resources/css/player.css">
    @endsection
    @section('title', 'Playlist View')
    @section('content')
<body>
    <h1>Songs in Playlist</h1>
    <ul>
        @foreach($songs as $song)
            <li><a class="niga" data-path="../../storage/app/public/{{$song->path}}">{{ $song->title }}</a></li>
        @endforeach
    </ul>
    @include('player');
</body>
<script src="../../resources/js/playmusic.js"></script>
@endsection