
document.getElementById("musicFolder").addEventListener("change", (e) => {
    const files = Array.from(e.target.files);
    const container = document.getElementById('songsContainer');
    container.innerHTML = '';
    container.innerHTML = '<label>Songy:</label>'
    files.forEach((file, index) => {
        //if (!file.type.startsWith("audio/")) return;
        
        const fileName = file.name;

        const songDiv = document.createElement('div');

        songDiv.innerHTML = `
            <input class='songAddInput' type="text" name="songs[]" value="${fileName.replace(/\.[^/.]+$/, '')}" required>
        `;
        container.style.display = "flex";
        document.getElementById("musicFolder").style.display = "none";
        container.appendChild(songDiv);
    });
});
