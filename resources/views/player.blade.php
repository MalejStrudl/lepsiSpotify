<footer>
    <audio src="" id="audio"></audio>
    <div class="song-play">
        <h2 id="songName">(Momentálně nic nepřehrává)</h2>
        <div class="progressBar">
            <span id="currentTime">0:00</span>
            <progress id="progressBar" value="0" max="100"></progress>

        </div>
        <div class="auto">
                <label for="autoplay">Automatické přehrávání</label>
                <input type="checkbox" name="" id="autoplay">
            </div>
        <div class="buttons">
            <button id="prevBtn" class="playingBtn"><img src="{{asset('img/prev.png')}}" alt="Předchozí"></button>
            <button id="playBtn" class="playingBtn"><img src="{{ asset('img/PlayBtn.png') }}" alt="play"></button>
            <button id="pauseBtn" class="playingBtn"><img src="{{asset('img/StopBtn.png')}}" alt="stop"></button>
            <button id="nextBtn"  class="playingBtn"><img src="{{asset('img/next.png')}}" alt="Další"></button>
            
        </div>
    </div>
</footer>