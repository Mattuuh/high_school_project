$(document).ready(function() {
    $('#search').on('input', function() {
        var searchTerm = $(this).val();

        if (searchTerm.trim() === '') {
            // Limpiar el datalist y cualquier información adicional si el campo está vacío
            $('#dniList').empty();
            $('#nombre_group').attr('hidden', 'hidden');
            $('#apellido_group').attr('hidden', 'hidden');
            return;
        }

        // Realizar la solicitud AJAX a Laravel
        $.ajax({
            type: 'POST',
            url: '/search', // Ruta definida en web.php
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { query: searchTerm },
            success: function(data) {
                // Actualizar el datalist con las opciones recibidas del servidor
                $('#dniList').empty();
                data.forEach(function(item) {
                    var option = $('<option value="' + item.dni_alu + '">');
                    option.attr('data-element-data', JSON.stringify(item));
                    $('#dniList').append(option);
                });
            }
        });
    });

    // Manejar el evento de selección de un elemento del datalist
    $('#search').on('change', function() {
        var selectedOption = $('#dniList option[value="' + $(this).val() + '"]');
        var elementDataAttr = selectedOption.attr('data-element-data');

        // Acceder a otras propiedades y mostrar información en la página
        if (elementDataAttr !== undefined && elementDataAttr !== null) {
            var elementData = JSON.parse(elementDataAttr);
            if (elementData) {
                // Supongamos que tienes un elemento con id "otherInfo" para mostrar información adicional
                $('#nombre_alu').text(elementData.nombre_alu);
                $('#nombre_group').removeAttr('hidden');
                $('#apellido_alu').text(elementData.apellido_alu);
                $('#apellido_group').removeAttr('hidden');
            } 
        }
    });
});
