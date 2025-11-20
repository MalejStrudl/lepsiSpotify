@extends('layout')
    @section('title', 'Přidat Playlist')
    @section('content')
<body>
    @if (session('is_admin'))
        <h1>Přidat Playlist</h1>
            <form action="{{route('playlist.addPlaylist')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="name">Název Playlistu:</label>
                <input type="text" name="name" required>
                <label for="type">Typ Playlistu:</label>
                <input type="text" name="type" required>
                <label for="file">Vyberte Playlist:</label>
                <input type="file" name="paths[]" webkitdirectory directory multiple required id="musicFolder">
                <br>
                <div id="songsContainer"></div>
                <button class="button"><a>Přidat</a></button>
            </form>
    @else
        <p>Nemáte oprávnění k přístupu na tuto stránku.</p>
    @endif
    
</body>
<script src="../resources/js/music.js"></script>
@endsection
