document.getElementById('UsarFormulario').addEventListener('submit', function(event) {
    const edad = parseInt(document.getElementById('edad').value); // Obtener la edad del formulario
    const plan = document.getElementById('plan').value; // Obtener el plan del formulario
    const paquetes = Array.from(document.querySelectorAll('input[name="paquetes[]"]:checked')).map(option => option.value); // Obtener los paquetes seleccionados
    const duracion = document.getElementById('duracion').value; // Obtener la duración del formulario

    // Restricciones
    if (edad < 18 && !paquetes.includes('Infantil')) { // Verificar si el usuario es menor de 18 años y no ha seleccionado el paquete Infantil
        alert('Los usuarios menores de 18 años solo pueden contratar el Pack Infantil.');
        event.preventDefault(); // Prevenir el envío del formulario
    } else if (plan === 'Basico' && paquetes.length > 1) { // Verificar si el usuario ha seleccionado más de un paquete con el plan Básico
        alert('Los usuarios del Plan Básico solo pueden seleccionar un paquete adicional.');
        event.preventDefault(); // Prevenir el envío del formulario
    } else if (paquetes.includes('Deporte') && duracion !== 'Anual') { // Verificar si el usuario ha seleccionado el paquete Deporte sin una suscripción anual
        alert('El Pack Deporte solo puede ser contratado con una suscripción anual.');
        event.preventDefault(); // Prevenir el envío del formulario
    }
});
