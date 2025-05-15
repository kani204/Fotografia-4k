// Función para mostrar/ocultar contraseña
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = input.parentElement.querySelector('.toggle-password i');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

// Validación del formulario de registro
document.addEventListener('DOMContentLoaded', function() {
    const formularioRegistro = document.getElementById('formularioRegistro');
    
    if (formularioRegistro) {
        formularioRegistro.addEventListener('submit', function(e) {
            const password = document.getElementById('password');
            const confirmarPassword = document.getElementById('confirmar_password');
            
            // Validar que las contraseñas coincidan
            if (password.value !== confirmarPassword.value) {
                e.preventDefault();
                alert('Las contraseñas no coinciden');
                return;
            }
            
            // Validar longitud mínima de contraseña
            if (password.value.length < 8) {
                e.preventDefault();
                alert('La contraseña debe tener al menos 8 caracteres');
                return;
            }
            
            // Validar que la contraseña contenga al menos una letra y un número
            const tieneLetra = /[A-Za-z]/.test(password.value);
            const tieneNumero = /[0-9]/.test(password.value);
            
            if (!tieneLetra || !tieneNumero) {
                e.preventDefault();
                alert('La contraseña debe contener al menos una letra y un número');
                return;
            }
        });
    }
});