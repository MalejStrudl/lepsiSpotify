<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Přidat Playlist</title>
</head>
<body>
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
        <button>Přidat</button>
    </form>
</body>
<script src="../resources/js/music.js"></script>
</html>