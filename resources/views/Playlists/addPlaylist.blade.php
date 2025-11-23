@extends('layout')
    @section('title', 'Přidat Playlist')
    @section('content')
    @section('links')
        <link rel="stylesheet" href="../resources/css/list.css">
<body>
    @if (session('is_admin'))
        <h1>Přidat Playlist</h1>
            <form action="{{route('playlist.addPlaylist')}}" method="post" enctype="multipart/form-data" class="form">
                @csrf
                <section>
                <div class="form-section">
                    <label for="name">Název Playlistu:</label>
                    <input type="text" name="name" required>
                    <label for="type">Typ Playlistu:</label>
                    <input type="text" name="type" required>
                    <label for="file">Vyberte Playlist:</label>
                    <input type="file" name="paths[]" webkitdirectory directory multiple required id="musicFolder">
                </div>
                <div class="form-section">
                    <h2 for="spec">Vyberte Specifikace:</h2>
                    <div class="spec-div">
                        <h4>Typy:</h4>
                        <div class="check-div">
                            @foreach ($types as $typ)
                                <div class="check">
                                    <label for="checkbox">{{$typ->name}}</label>
                                    <input type="checkbox" name="specifications[]" value="{{$typ->id}}"  class="box" hidden>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="spec-div">
                        <h4>Playlisty:</h4>
                        <div class="check-div">
                            @foreach ($plays as $typ)
                                <div class="check">
                                    <label for="checkbox">{{$typ->name}}</label>
                                    <input type="checkbox" name="specifications[]" value="{{$typ->id}}"  class="box" hidden>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="spec-div">
                        <h4>Tance:</h4>
                        <div class="check-div">
                            @foreach ($dances as $typ)
                                <div class="check">
                                    <label for="checkbox">{{$typ->name}}</label>
                                    <input type="checkbox" name="specifications[]" value="{{$typ->id}}" class="box" hidden>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                </section>
                <br>
                <div id="songsContainer"></div>
                <button class="button"><a>Přidat</a></button>
            </form>
    @else
        <p>Nemáte oprávnění k přístupu na tuto stránku.</p>
    @endif
    
</body>
<script src="../resources/js/music.js"></script>
<script src="../resources/js/list.js"></script>
@endsection
