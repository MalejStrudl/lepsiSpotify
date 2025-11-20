
<footer>
    <audio src="" id="audio"></audio>
    <div class="song-play">
        <h2 id="songName">(Momentálně nic nepřehrává)</h2>
        <div class="progressBar">
            <span id="currentTime">0:00</span>
            <progress id="progressBar" value="0" max="100"></progress>

        </div>
        <button id="playBtn"><img src="{{ asset('img/PlayBtn.png') }}" alt="play"></button>
        <button id="pauseBtn"><img src="{{asset('img/StopBtn.png')}}" alt="stop"></button>
    </div>
</footer>