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

    <div class="queue-btn" id="queue-btn">
        <img src="{{asset('img/queue.png')}}" alt="Fronta">
        <p>Fronta</p>
    </div>
        <div class="queue-container" id="queue-container">
            <ul id="playlist-container">
                <p style="text-align: center; padding:3px; font-style:italic;">Playlisty:</p>
            @foreach($allPlaylists as $playl)
                <li class="playlistInQueue" onclick="showSongs('{{$playl->id}}', '{{$playl->name}}')">{{$playl->name}}</li>
            @endforeach
            </ul>
        </div>
        <div class="queue-container" id="queue-list">
            
        </div>
    </div>
            <div id="cont">
            <ul id="song-container">
                <div class="sg-head">
                    <img src="{{asset('img/cross-black.png')}}" alt="back" onclick="hideSongs()">
                    <h3 id="plname"></h3>
                </div>
                @foreach($allSongs as $s)
                    <li class="songsInQueue" data-pid="{{$s->playlist_id}}" data-song-path="{{asset('storage/' . $s->path)}}" data-songid="{{$s->id}}"><p>{{$s->title}}</p></li>
                @endforeach
            </ul>
            </div>
    @include('player')
    <script src="{{asset('js/playlists.js')}}"></script>
</body>
@endsection