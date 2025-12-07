    @extends('layout')
    @section('links')
    <link rel="stylesheet" href="{{asset('css/player.css')}}">
    @endsection
    @section('title', 'Zobrazení playlistu')
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
    <div class="queue">

    <div class="queue-btn" id="">
        <img src="{{asset('img/queue.png')}}" alt="Fronta">
        <p>Fronta</p>
    </div>
        <div class="queue-container">
            <ul id="playlist-container">
            @foreach($allPlaylists as $playl)
                <li onclick="showSongs('{{$playl->id}}')">{{$playl->name}}</li>
            @endforeach
            </ul>
            <ul id="song-container">
                <img src="{{asset('img/cross-black.png')}}" alt="back" onclick="hideSongs()">
                        @foreach($allSongs as $s)
                                <li class="songsInQueue" data-pid="{{$s->playlist_id}}">{{$s->title}}</li>
                        @endforeach
            </ul>
                    

                
        </div>
    </div>
    @include('player')
    <script src="{{asset('js/playlists.js')}}"></script>
</body>
@endsection