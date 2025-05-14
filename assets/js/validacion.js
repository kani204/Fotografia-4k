document.querySelector('form').addEventListener('submit', function(e) {
    let valido = true;

    // validacion simple de campos requeridos
    this.querySelectorAll('input').forEach(function(input) {
        if (!input.value) {
            valido = false;
            input.classList.add('is-invalid');
        } else {
            input.classList.remove('is-invalid');
        }
    });

    if (!valido) e.preventDefault();
});