document.addEventListener('DOMContentLoaded', function() {
    const audioPlayer = new Audio('assets/audio/musica.mp3');
    const audioButton = document.getElementById('audioButton');
    const audioIcon = audioButton.querySelector('i');
    const progressBar = document.getElementById('audioProgress');
    const currentTime = document.getElementById('currentTime');
    const duration = document.getElementById('duration');
    const volumeControl = document.getElementById('volumeControl');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    
    // Configuración inicial del audio
    audioPlayer.loop = true;
    audioPlayer.volume = 0.5;
    
    // Estado del audio en localStorage
    const audioEstado = localStorage.getItem('audioEstado');
    if (audioEstado === 'reproduciendo') {
        audioPlayer.play();
        audioIcon.classList.replace('fa-play', 'fa-pause');
    }
    
    // Formatear tiempo en minutos:segundos
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs < 10 ? '0' : ''}${secs}`;
    }
    
    // Actualizar barra de progreso y tiempo
    audioPlayer.addEventListener('timeupdate', () => {
        const percent = (audioPlayer.currentTime / audioPlayer.duration) * 100;
        progressBar.value = percent;
        currentTime.textContent = formatTime(audioPlayer.currentTime);
    });
    
    // Cuando se carga el audio
    audioPlayer.addEventListener('loadedmetadata', () => {
        duration.textContent = formatTime(audioPlayer.duration);
        progressBar.value = 0;
    });
    
    // Control de volumen
    volumeControl.addEventListener('input', () => {
        audioPlayer.volume = volumeControl.value;
    });
    
    // Cambiar posición en la canción
    progressBar.addEventListener('input', () => {
        const time = (progressBar.value * audioPlayer.duration) / 100;
        audioPlayer.currentTime = time;
    });
    
    // Función para alternar el audio
    function toggleAudio() {
        if (audioPlayer.paused) {
            audioPlayer.play();
            audioIcon.classList.replace('fa-play', 'fa-pause');
            localStorage.setItem('audioEstado', 'reproduciendo');
        } else {
            audioPlayer.pause();
            audioIcon.classList.replace('fa-pause', 'fa-play');
            localStorage.setItem('audioEstado', 'pausado');
        }
    }
    
    // Retroceder 10 segundos
    prevButton.addEventListener('click', () => {
        audioPlayer.currentTime = Math.max(0, audioPlayer.currentTime - 10);
    });
    
    // Adelantar 10 segundos
    nextButton.addEventListener('click', () => {
        audioPlayer.currentTime = Math.min(audioPlayer.duration, audioPlayer.currentTime + 10);
    });
    
    // Evento click del botón principal
    audioButton.addEventListener('click', toggleAudio);
    
    // Manejar visibilidad de la página
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            audioPlayer.pause();
            audioIcon.classList.replace('fa-pause', 'fa-play');
        } else if (localStorage.getItem('audioEstado') === 'reproduciendo') {
            audioPlayer.play();
            audioIcon.classList.replace('fa-play', 'fa-pause');
        }
    });
}); 