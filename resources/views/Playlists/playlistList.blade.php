@extends('layout')
    @section('title', 'Seznam Playlistů')
    @section('content')
    @section('links')
        <link rel="stylesheet" href="../resources/css/list.css">
        @endsection
<body>
    <h1>Seznam Playlistů</h1>
    <ul>
        <form action="{{route('selectSpecification')}}" method="post">
            @csrf
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
                <button>Select</button>
        </form>
    </ul>
    <ul>
        @foreach($playlists as $playlist)
            <li><a href="{{ route('playlist.view', $playlist->name) }}">
                <div>
                    <img src="{{asset('')}}" alt="" srcset="">
                {{ $playlist->name }} - {{ $playlist->type }}
            </div>
        </a>
    </li>
        @endforeach
    </ul>
    @if(session('is_admin'))
        <button class="button"><a href="{{ route('playlist.add') }}">Přidat playlist</a></button>
    @endif
</body>
<script src="../resources/js/list.js"></script>
</html>
@endsection