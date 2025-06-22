document.addEventListener('DOMContentLoaded', function() {
    function mostrarContenido(index) {
        var contenidos = document.querySelectorAll('.contenido');
        contenidos.forEach(function(contenido) {
            contenido.style.display = 'none';
        });
        document.getElementById('contenido' + index).style.display = 'block';
    }

    document.querySelectorAll('.pestaña').forEach(function(pestaña, index) {
        pestaña.addEventListener('click', function() {
            mostrarContenido(index + 1);
        });
    });

    mostrarContenido(1); // Mostrar el primer contenido por defecto

    // Manejar la lógica de envío de formularios
    document.querySelectorAll('.form-inline').forEach(function(formulario) {
        formulario.addEventListener('submit', function(e) {
            e.preventDefault(); // Evitar la recarga de la página
            var formData = new FormData(formulario);
            var actionUrl = formulario.getAttribute('action');

            fetch(actionUrl, {
                method: 'POST', // Cambiar a POST si es necesario
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Aquí puedes manejar la respuesta que devuelve el servidor
                // Por ejemplo, actualizar el contenido o mostrar un mensaje
                document.getElementById('contenido' + (index + 1)).innerHTML = data; // Actualiza el contenido
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
