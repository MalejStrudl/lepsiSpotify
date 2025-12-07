let playlistContainer = document.getElementById('playlist-container');
let songsContainer = document.getElementById('song-container');
let songs = document.getElementsByClassName('songsInQueue');
function showSongs(id) {
    songsContainer.style.display = "block";
    for (let i = 0; i < songs.length; i++) {
        songs[i].style.display = "none";
        if (songs[i].dataset.pid == id) {
            songs[i].style.display = "block";
        }
    }
}

function hideSongs() {
    songsContainer.style.display = "none";
}