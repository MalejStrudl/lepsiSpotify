let playlistContainer;
let songsContainer;
let songs;
document.addEventListener('DOMContentLoaded', function () {
    playlistContainer = document.getElementById('playlist-container');
    songsContainer = document.getElementById('cont');
    songs = document.querySelectorAll('.songsInQueue');
});
let queuebtn = document.getElementById('queue-btn');
queuebtn.addEventListener('click', showPlaylists);
function showPlaylists() {
    document.getElementById('queue-container').classList.toggle('block');
    queuebtn.classList.toggle('bb');
}
function showSongs(id, name) {
    songsContainer.style.display = "flex";
            let oldBtn = document.querySelectorAll('.queueAdd-btn');
            for (let i = 0; i < oldBtn.length; i++) {
                oldBtn[i].remove();
            }
        document.getElementById('plname').innerText = name;
    for (let i = 0; i < songs.length; i++) {
        songs[i].style.display = "none";
        if (songs[i].dataset.pid == id) {
            let btn = document.createElement('button');
            songs[i].style.display = "flex";
            btn.innerText = "+";
            btn.classList.add('queueAdd-btn');
            btn.dataset.idS = songs[i].dataset.songid;
            btn.onclick = addToQueue;
            songs[i].append(btn);
        }
    }
}

function hideSongs() {
    songsContainer.style.display = "none";
}