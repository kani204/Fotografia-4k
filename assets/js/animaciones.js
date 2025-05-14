document.addEventListener('DOMContentLoaded', function() {
    const observador = new IntersectionObserver((elementos) => {
        elementos.forEach(elemento => {
            if (elemento.isIntersecting) {
                elemento.target.classList.add('aparecer');
            }
        });
    });

    document.querySelectorAll('section').forEach((seccion) => {
        observador.observe(seccion);
    });
}); 