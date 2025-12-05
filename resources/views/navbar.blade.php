<nav class="wrap">
<nav class="ham" id="ham" onclick="showHam()">
    <img src="{{asset('img/ham.png')}}" alt="Menu" class="imgHam">
</nav>
<nav id="menu">
    <a class="menu-item" href="{{route('home')}}"><img class="logo" src="{{asset('img/glg.png')}}" alt="Glg" class="imgHam"></a>
    <a class="menu-item" href="{{route('playlist.list')}}">Seznam Playlistů</a>
    <a class="menu-item" href="{{route('login')}}">Přihlásit se</a>
    <a class="menu-item" href="{{route('register')}}">Zaregistrovat se</a>
</nav>

</nav>
<script>
    let show = false;
    function showHam() {
        show = !show;
        if (show) {
            document.getElementById('ham').style.left = document.getElementById('menu').style.width = "15vw";
        } else {
            document.getElementById('ham').style.left = document.getElementById('menu').style.width = "0vw";
        }
    }
</script>