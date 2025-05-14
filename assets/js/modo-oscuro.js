document.addEventListener('DOMContentLoaded', function() {
    const botonTema = document.getElementById('botonTema');
    const iconoTema = botonTema.querySelector('i');
    const temaGuardado = localStorage.getItem('tema');

    // aplicar tema guardado o preferencia del sistema
    if (temaGuardado) {
        if (temaGuardado === 'oscuro') {
            document.body.classList.add('tema-oscuro');
            iconoTema.classList.replace('fa-moon', 'fa-sun');
        }
    } else {
        // detecta preferencia del sistema
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.body.classList.add('tema-oscuro');
            iconoTema.classList.replace('fa-moon', 'fa-sun');
            localStorage.setItem('tema', 'oscuro');
        }
    }

    // cambia tema al hacer clic
    botonTema.addEventListener('click', function() {
        document.body.classList.toggle('tema-oscuro');
        
        if (document.body.classList.contains('tema-oscuro')) {
            localStorage.setItem('tema', 'oscuro');
            iconoTema.classList.replace('fa-moon', 'fa-sun');
        } else {
            localStorage.setItem('tema', 'claro');
            iconoTema.classList.replace('fa-sun', 'fa-moon');
        }
    });

    // escucha cambios en la preferencia del sistema
    if (window.matchMedia) {
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if (!localStorage.getItem('tema')) {
                if (e.matches) {
                    document.body.classList.add('tema-oscuro');
                    iconoTema.classList.replace('fa-moon', 'fa-sun');
                } else {
                    document.body.classList.remove('tema-oscuro');
                    iconoTema.classList.replace('fa-sun', 'fa-moon');
                }
            }
        });
    }
});