
song = document.getElementsByClassName("niga");
songs = Array.from(song);
let names = document.getElementsByClassName('name');
let queue = [];

let playing = false;
let indexOfPlaying;
let isqueue = false;
let queueIndex = 0;
for (let i = 0; i < songs.length; i++) {
    songs[i].addEventListener("click", () => {
        playAudio(i);
    });
}

let audioPlayer = document.getElementById("audio");
let progressBar = document.getElementById("progressBar");
let time = document.getElementById("currentTime");
function playAudio(index) {
    let songName = document.getElementById("songName");
    if (isqueue && queue.length > 0) {

        // PŘEHRÁVAT FRONTU
        songName.innerText = queue[queueIndex].title;
        audioPlayer.src = queue[queueIndex].path;
        localStorage.setItem("lastSongPath", queue[queueIndex].path);
        localStorage.setItem("lastSongName", queue[queueIndex].title);
        localStorage.setItem("lastSongIndex", index);

    } else {
        indexOfPlaying = index;
        // PŘEHRÁVAT NORMÁLNÍ SEZNAM
        songName.innerText = names[indexOfPlaying].innerText;
        audioPlayer.src = song[indexOfPlaying].dataset.path;
    localStorage.setItem("lastSongIndex", index);
    localStorage.setItem("lastSongPath", song[index].dataset.path);
    localStorage.setItem("lastSongName", names[index].innerText);
    }
    audioPlayer.play();
    playBtn.style.display = "none";
    pauseBtn.style.display = "inline";
    playing = true;
}
let ss = document.getElementsByClassName('songsInQueue');
let list = document.getElementById('queue-list');
function addToQueue() {
    this.innerText = "✓";
    for (let i = 0; i < ss.length; i++) {
        if (ss[i].dataset.songid == this.dataset.idS) {
            queue.push({
                title: ss[i].firstChild.textContent,
                path: ss[i].dataset.songPath
            });
            isqueue = true;
            let p = document.createElement('p');
            p.innerText = ss[i].firstChild.textContent;
            list.style.display = "block";
            p.classList.add('queue-listitem');
            p.onclick = () => {
                removeFromQueue(p.innerText);
                p.remove();
            }
            list.appendChild(p);
        }
    }
}

function removeFromQueue(name) {
    const index = queue.findIndex(s => s.title === name);
    if (index !== -1) queue.splice(index, 1);
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
    // pokud jede fronta
    if (isqueue) {


        if (queueIndex < queue.length) {
            // další song ve frontě
            playAudio(-1);
            queueIndex++;
        } else {
            // Fronta skončila → vypnout frontu
            isqueue = false;
            queue = [];
            queueIndex = 0;

            // pokračovat v normálním playlistu
            playAudio(indexOfPlaying + 1);
        }
        if (list.firstChild.innerText == list.lastChild.innerText) {
            list.firstChild.remove();
            list.style.display = 'none';
        } else {
            list.firstChild.remove();
        }
        return;
    }

    // normální playlist
    if (indexOfPlaying + 1 < songs.length) {
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
    if (audioPlayer.currentTime / audioPlayer.duration == 1 && autoplay.checked && indexOfPlaying + 1 < songs.length) {
        nextSong();
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
});

window.addEventListener("load", () => {
    const savedTime = localStorage.getItem("audioTime");
    const lastSongPath = localStorage.getItem("lastSongPath");
    const lastSongIndex = localStorage.getItem("lastSongIndex");
    const songname = localStorage.getItem("lastSongName");



    if (lastSongPath) {
        audioPlayer.src = lastSongPath;
        indexOfPlaying = parseInt(lastSongIndex);

        // obnov jméno píšně v UI
        let songName = document.getElementById("songName");
        songName.innerText = songname;
    }
});

// Uložení stavu play/pause
audioPlayer.addEventListener("play", () => {
    localStorage.setItem("audioPlaying", true);
});

audioPlayer.addEventListener("pause", () => {
    localStorage.setItem("audioPlaying", false);
});