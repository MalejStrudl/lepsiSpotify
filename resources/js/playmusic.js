let song = document.getElementsByClassName("niga");
let playing = false;
for (let i = 0; i < song.length; i++) {
    song[i].addEventListener("click", () => {
        playAudio(song[i].getAttribute("data-path"), song[i].innerText);
    });
}

let audioPlayer = document.getElementById("audio");
let progressBar = document.getElementById("progressBar");
let time = document.getElementById("currentTime");

function playAudio(path, name) {
    let songName = document.getElementById("songName");
    songName.innerText = name;
    audioPlayer.src = path;
    audioPlayer.play();
    playBtn.style.display = "none";
    pauseBtn.style.display = "inline";
    playing = true;
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
playBtn.addEventListener("click", unpauseAudio);
pauseBtn.addEventListener("click", pauseAudio);

let currentTime = audioPlayer.currentTime;
let duration = audioPlayer.duration;
audioPlayer.ontimeupdate = function() {
    progressBar.value = (audioPlayer.currentTime / audioPlayer.duration) * 100;
    time.innerText = formatTime(audioPlayer.currentTime) + " / " + formatTime(audioPlayer.duration);
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