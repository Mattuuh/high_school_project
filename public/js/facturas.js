$(document).ready(function() {
    $('#search').select2({
        ajax: {
           url: '/search', // Ruta definida en web.php
           dataType: 'json',
           headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: function(params) {
              return {
                 query: params.term // Término de búsqueda (DNI)
              };
           },
           processResults: function(data) {
              return {
                 results: data
              };
           },
           cache: true
        },
        placeholder: 'Buscar por DNI',
        minimumInputLength: 1
     });

    $('#search').on('select2:select', function(e) {
        var selectedOption = e.params.data;
        var elementDataAttr = selectedOption['data-element-data'];

        // Acceder a otras propiedades y mostrar información en la página
        if (elementDataAttr !== undefined && elementDataAttr !== null) {
            var elementData = JSON.parse(elementDataAttr);
            if (elementData) {
                // Supongamos que tienes elementos con id "name" y "lastname" para mostrar información adicional
                $('#name').text(elementData.nombre);
                $('#name_group').removeAttr('hidden');
                $('#lastname').text(elementData.apellido);
                $('#lastname_group').removeAttr('hidden');
            } 
        }
    });


    // $('#search').on('input', function() {
    //     var searchTerm = $(this).val();

    //     if (searchTerm.trim() === '') {
    //         // Limpiar el datalist y cualquier información adicional si el campo está vacío
    //         $('#dniList').empty();
    //         $('#nombre_group').attr('hidden', 'hidden');
    //         $('#apellido_group').attr('hidden', 'hidden');
    //         return;
    //     }

    //     // Realizar la solicitud AJAX a Laravel
    //     $.ajax({
    //         type: 'POST',
    //         url: '/search', // Ruta definida en web.php
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         data: { query: searchTerm },
    //         success: function(data) {
    //             // Actualizar el datalist con las opciones recibidas del servidor
    //             $('#dniList').empty();
    //             data.forEach(function(item) {
    //                 var option = $('<option value="' + item.dni + '">');
    //                 option.attr('data-element-data', JSON.stringify(item));
    //                 $('#dniList').append(option);
    //             });
    //         }
    //     });
    // });

    // // Manejar el evento de selección de un elemento del datalist
    // $('#search').on('change', function() {
    //     var selectedOption = $('#dniList option[value="' + $(this).val() + '"]');
    //     var elementDataAttr = selectedOption.attr('data-element-data');
    //     console.log(elementDataAttr)

    //     // Acceder a otras propiedades y mostrar información en la página
    //     if (elementDataAttr !== undefined && elementDataAttr !== null) {
    //         var elementData = JSON.parse(elementDataAttr);
    //         if (elementData) {
    //             // Supongamos que tienes un elemento con id "otherInfo" para mostrar información adicional
    //             $('#name').text(elementData.nombre);
    //             $('#name_group').removeAttr('hidden');
    //             $('#lastname').text(elementData.apellido);
    //             $('#lastname_group').removeAttr('hidden');
    //         } 
    //     }
    // });

    // Cuota
    $('#cuota').on('change', function() {
        let selectedCuota = $('#cuota option[value="' + $(this).val() + '"]');
        let elementDataAttr = selectedCuota.attr('data-element-data');

        if (this.value != 0) {
            var elementData = JSON.parse(elementDataAttr);
            if (elementData) {
                // Supongamos que tienes un elemento con id "otherInfo" para mostrar información adicional
                $('#monto').text('$' + elementData.monto);
                $('#monto_group').removeAttr('hidden');
            } 
        } else {
            $('#monto_group').attr('hidden', 'hidden');
        }
    })
});
