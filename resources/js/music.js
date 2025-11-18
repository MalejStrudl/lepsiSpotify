document.getElementById("musicFolder").addEventListener("change", (e) => {
    const files = Array.from(e.target.files);
    const container = document.getElementById('songsContainer');
    container.innerHTML = ''; 
    files.forEach((file, index) => {
        if (!file.type.startsWith("audio/")) return;
        
        const fileName = file.name;

        const songDiv = document.createElement('div');
        songDiv.style.marginBottom = "10px";

        songDiv.innerHTML = `
            <label>Název songu:</label>
            <input type="text" name="songs[]" value="${fileName.replace(/\.[^/.]+$/, '')}" required>

        `;

        container.appendChild(songDiv);
    });
});
