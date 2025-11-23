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
            <li><a class="niga" data-path="../../storage/app/public/{{$song->path}}"><div class="song-div"><img src="{{asset('img/music.png')}}" alt="">{{ $song->title }}</div></a></li>
        @endforeach
    </ul>
    @include('player')
</body>
<script src="../../resources/js/playmusic.js"></script>
@endsection