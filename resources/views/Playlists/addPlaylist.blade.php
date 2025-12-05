@extends('layout')
    @section('title', 'Přidat Playlist')
    @section('content')
    @section('links')
        <link rel="stylesheet" href="{{asset('css/list.css')}}">
        <link rel="stylesheet" href="{{asset('css/player.css')}}">
<body class="body">
    @include('navbar')
    @if (session('is_admin'))
    <header>
        <h1>Přidat Playlist</h1>

    </header>
                <form action="{{route('playlist.addPlaylist')}}" method="post" enctype="multipart/form-data" class="form">
                    
                @if ($errors->any())
                <div class="errMsg">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                    @csrf
                    <section>
                    <div class="form-section">
                        <label for="name">Název Playlistu:</label>
                        <input type="text" name="name" required>
                        <label for="type">Popis Playlistu:</label>
                        <input type="text" name="type" required>
                        <label for="musicFolder" class="file-btn">Vyberte Playlist:</label>
                        <input type="file" name="paths[]" webkitdirectory directory multiple required id="musicFolder">
                        <div id="songsContainer"></div>
                        <div class="form-btn">
                            <button>Přidat Playlist</button>
                        </div>

                    </div>
                    <div class="form-section spec">
                        <h2 for="spec">Vyberte Specifikace:</h2>
                        <div class="spec-div typ">
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
        <hr>
                        @if(session('is_admin'))
                        <div class="spec-div btn">
                            <button type="button" id="addSpec">Přidat specifikaci</button>
                        </div>
                        @endif
                    </div>
                    </section>
                    <br>
                </form>
        </div>
                    @if(session('is_admin'))
                    <div class="addSpecDiv">
                        <img src="{{asset('img/cross-black.png')}}" alt="Zavřít" id="cross">
                        <form action="{{route('playlist.addSpecification')}}" method="post" class="center">
                            @csrf
                            <label for="name">Název specifikace: </label>
                            <input type="text" name="name">
                            <label for="importance">Typ specifikace: </label>
                            <select name="importance">
                                <option value="1">Tanec</option>
                                <option value="2">Playlist</option>
                                <option value="3">Typ tance</option>
                            </select>
                            <button>Přidat</button>
                        </form>
                    </div>
                    @endif
    @else
        <p>Nemáte oprávnění k přístupu na tuto stránku.</p>
    @endif
    @include('player')
</body>
<script src="../resources/js/music.js"></script>
<script src="../resources/js/list.js"></script>
@endsection
