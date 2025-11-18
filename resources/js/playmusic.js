let niga = document.getElementsByClassName("niga");
for (let i = 0; i < niga.length; i++) {
    niga[i].addEventListener("click", () => {
        playAudio(niga[i].getAttribute("data-path"));
    });
}

function playAudio(path) {
    const audioPlayer = document.getElementsByClassName("audio");
    for (let i = 0; i < audioPlayer.length; i++) {
        if (audioPlayer[i].getAttribute("src") == path) {
            audioPlayer[i].play();
        }
    }
}