document.getElementById('formComentario').addEventListener('submit', function(event) {
    // Evitar que el formulario se envíe directamente
    event.preventDefault();

    // Obtener los valores de los campos
    const nombre = document.getElementById('nombre').value.trim();
    const apellidos = document.getElementById('apellidos').value.trim();
    const mensaje = document.getElementById('mensaje').value.trim();
    const email = document.getElementById('email').value.trim();

    // Validar que todos los campos estén llenos
    if (!nombre || !apellidos || !mensaje || !email) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Por favor, completa todos los campos.',
        });
        return; // Detiene el envío si hay campos vacíos
    }

    // Si la validación es exitosa, mostrar mensaje de éxito
    Swal.fire({
        icon: 'success',
        title: '¡Formulario enviado!',
        text: 'Tus datos comentarios han sido guardados.',
        confirmButtonText: 'Aceptar'
    }).then(() => {
        // Envía el formulario manualmente si todo está correcto
        document.getElementById('formComentario').submit();
    });
});
