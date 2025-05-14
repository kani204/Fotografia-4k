document.querySelectorAll('.imagen-galeria').forEach(function(imagen) {
    imagen.addEventListener('click', function() {
        window.location.href = 'detalle.php?id=' + this.dataset.id;
    });
});