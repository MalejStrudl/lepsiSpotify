    @extends('layout')
    @section('links')
    <link rel="stylesheet" href="{{asset('css/player.css')}}">
    @endsection
    @section('title', 'Playlist View')
    @section('content')
<body class="body">
    @include('navbar')
    <header>
        <h1>{{$playlist}}</h1>

    </header>
    <ul class="songs">
        @foreach($songs as $song)
            <li><a class="niga" data-path="{{ asset('storage/' . $song->path) }}"><div class="song-div"><img src="{{asset('img/note.png')}}" alt="" class="note"><p class="name">{{ $song->title }}</p></div></a></li>
        @endforeach
    </ul>
    @include('player')
</body>
@endsection