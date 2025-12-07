@extends('layout')
    @section('title', 'Seznam Playlistů')
    @section('content')
    @section('links')
        <link rel="stylesheet" href="{{asset('css/list.css')}}">
        <link rel="stylesheet" href="{{asset('css/player.css')}}">
        @endsection
<body class="body">
    @include('navbar')
    <header>
    <h1>Seznam Playlistů</h1>
    </header>
    <section class="head-section">
        <div class="yay">
            <ul class="playlists">
                @foreach($playlists as $playlist)
                    <li class="playl"><a href="{{ route('playlist.view', $playlist->name) }}" class="playlist">
                        
                        {{ $playlist->name }} - {{ $playlist->type }}
                    
                </a>
            </li>
                @endforeach
            </ul>
                @if (session('is_admin'))
                    <button class="button"><a href="{{ route('playlist.add') }}">Přidat playlist</a></button>
                    @endif
            </div>
        <div class="specifications spec">
            <ul style="height: 100%;">
                <form action="{{route('selectSpecification')}}" method="post" style="height: 100%; display:flex; flex-direction:column; justify-content:space-between;">
                    @csrf
                        <div class="form-section">
                            <h2 for="spec" style="text-align: center;">Vyberte Specifikace:</h2>
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
                        <div class="spec-div btn">
                        <button class="spec-btn">Select</button>

                        </div>
                        </div>
                </form>
            </ul>


        </div>
    </section>
</body>
    @include('player')
<script src="../resources/js/list.js"></script>
</html>
@endsection