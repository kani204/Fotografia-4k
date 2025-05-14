document.addEventListener('DOMContentLoaded', function() {
    // manejo del menu móvil
    const botonMenu = document.querySelector('.boton-menu');
    const menuNavegacion = document.querySelector('.menu-navegacion');
    
    if (botonMenu) {
        botonMenu.addEventListener('click', function() {
            menuNavegacion.classList.toggle('mostrar');
            botonMenu.classList.toggle('activo');
        });
    }

    // manejo del menu de usuario en movil
    const botonesUsuario = document.querySelectorAll('.boton-usuario');
    
    botonesUsuario.forEach(boton => {
        boton.addEventListener('click', function() {
            this.parentElement.classList.toggle('activo');
        });
    });

    // cerrar menus al hacer clic fuera
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.menu-usuario') && !event.target.closest('.boton-menu')) {
            document.querySelectorAll('.menu-usuario').forEach(menu => {
                menu.classList.remove('activo');
            });
            
            if (!event.target.closest('.menu-navegacion')) {
                menuNavegacion.classList.remove('mostrar');
                botonMenu.classList.remove('activo');
            }
        }
    });

    // manejo del tema oscuro
    const botonTema = document.getElementById('botonTema');
    const iconoTema = botonTema.querySelector('i');
    const temaGuardado = localStorage.getItem('tema');

    // aplicar tema guardado
    if (temaGuardado === 'oscuro') {
        document.body.classList.add('tema-oscuro');
        iconoTema.classList.replace('fa-moon', 'fa-sun');
    }

    // cambiar tema
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
}); 