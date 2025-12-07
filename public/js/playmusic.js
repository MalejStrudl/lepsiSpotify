let isPathSet = false;
song = document.getElementsByClassName("niga");
songs = Array.from(song);
let playing = false;
let indexOfPlaying;
let isfronta = false;
for (let i = 0; i < song.length; i++) {
    song[i].addEventListener("click", () => {
        playAudio(i);
    });
}

let audioPlayer = document.getElementById("audio");
let progressBar = document.getElementById("progressBar");
let time = document.getElementById("currentTime");
function playAudio(index) {
    song = document.getElementsByClassName("niga");
    indexOfPlaying = index;
    let songName = document.getElementById("songName");
    songName.innerText = song[indexOfPlaying].innerText;
    if (isPathSet) {
        audioPlayer.src = lastSongPath;
    } else {
        audioPlayer.src = song[indexOfPlaying].getAttribute("data-path");
    }
    localStorage.setItem("audioTime", 0);
    audioPlayer.currentTime = 0;
    audioPlayer.play();
    playBtn.style.display = "none";
    pauseBtn.style.display = "inline";
    playing = true;
    localStorage.setItem("lastSongIndex", index);
    localStorage.setItem("lastSongPath", song[index].getAttribute("data-path"));
    localStorage.setItem("lastSongName", song[index].innerText);
}
let playBtn = document.getElementById("playBtn");
let pauseBtn = document.getElementById("pauseBtn");
function pauseAudio() {
    audioPlayer.pause();
    pauseBtn.style.display = "none";
    playBtn.style.display = "inline";
    playing = false;
}
function unpauseAudio() {
    if (audioPlayer.src == "") {
        alert("No song is selected");
    } else {
        audioPlayer.play();
        pauseBtn.style.display = "inline";
        playBtn.style.display = "none";
        playing = true;
    }
}
document.getElementById("prevBtn").addEventListener('click', prevSong);
document.getElementById("nextBtn").addEventListener('click', nextSong);
function nextSong() {
    if (indexOfPlaying + 1 < song.length) {
        playAudio(indexOfPlaying + 1);
    } else {
        playAudio(0);
    }
}

function prevSong() {
    if (!indexOfPlaying - 1 < 0) {
        playAudio(indexOfPlaying - 1);
    }
}
playBtn.addEventListener("click", unpauseAudio);
pauseBtn.addEventListener("click", pauseAudio);

let currentTime = audioPlayer.currentTime;
let duration = audioPlayer.duration;
let autoplay = document.getElementById("autoplay");
audioPlayer.ontimeupdate = function() {
    if (!isFinite(audioPlayer.duration) || audioPlayer.duration === 0) return;

    progressBar.value = (audioPlayer.currentTime / audioPlayer.duration) * 100;
    time.innerText = formatTime(audioPlayer.currentTime) + " / " + formatTime(audioPlayer.duration);
    if (audioPlayer.currentTime / audioPlayer.duration == 1 && autoplay.checked && indexOfPlaying + 1 < song.length) {
        playAudio(indexOfPlaying + 1);
    }
}


function formatTime(seconds) {
    let minutes = Math.floor(seconds / 60);
    let secs = Math.floor(seconds % 60);
    return minutes + ":" + (secs < 10 ? "0" + secs : secs);
}

progressBar.addEventListener("click", function(e) {
    const rect = progressBar.getBoundingClientRect();
    const clickX = e.clientX - rect.left;
    const percent = clickX / rect.width;
    audioPlayer.currentTime = percent * audioPlayer.duration;
    unpauseAudio();
});

window.addEventListener("keydown", function(e) {
    if (e.code === "Space") {
        e.preventDefault(); // zabrání scrollování stránky
        if (playing) {
            pauseAudio();
        } else {
            unpauseAudio();
        }
    }
});

window.addEventListener("beforeunload", () => {
    localStorage.setItem("audioTime", audioPlayer.currentTime);
    // Uložení stavu přehrávání také zde pro jistotu
    localStorage.setItem("audioPlaying", !audioPlayer.paused);
});

window.addEventListener("load", () => {
    const savedTime = localStorage.getItem("audioTime");
    const savedPlaying = localStorage.getItem("audioPlaying");
    const lastSongPath = localStorage.getItem("lastSongPath");
    const lastSongIndex = localStorage.getItem("lastSongIndex");
    const songname = localStorage.getItem("lastSongName");



    if (lastSongPath) {
        audioPlayer.src = lastSongPath;
        indexOfPlaying = parseInt(lastSongIndex);

        // obnov jméno píšně v UI
        let songName = document.getElementById("songName");
        songName.innerText = songname;

        audioPlayer.addEventListener("loadedmetadata", () => {
            if (savedTime !== null) {
                audioPlayer.currentTime = parseFloat(savedTime);
            }

            if (savedPlaying == true) {
                audioPlayer.play().catch(() => {});
            } else {
            }
        });
    }
});

// Uložení stavu play/pause
audioPlayer.addEventListener("play", () => {
    localStorage.setItem("audioPlaying", true);
});

audioPlayer.addEventListener("pause", () => {
    localStorage.setItem("audioPlaying", false);
});