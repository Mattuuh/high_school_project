let configurationDataTable = {
    responsive: true,
	autoWidth: false,
	paging: true,
	destroy: true,
	deferRender: false,
	bLengthChange: true,
	select: false,
    searching: true,
	pageLength: 10,
	lengthMenu: [[5,10,20,-1],[5,10,20,'Todos']],
	language: {
		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"search": "_INPUT_",
		"searchPlaceholder": "...",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
	},
	columnDefs: [
		{'orderable': false, 'targets': [2,5,7]}
	]
}

$(function() {
    table = $('#tabla-facturas').DataTable(configurationDataTable);
});

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

    $('#search').change(function() {
        // Obtén el valor seleccionado
        var legajo_alu = $(this).val();

        // Realiza una solicitud AJAX al servidor para obtener las opciones relevantes para el segundo select
        $.ajax({
            url: '/obtenerCuotas', // Reemplaza con la URL de tu controlador
            method: 'POST', // Puedes ajustar el método según tus necesidades
            data: { legajo_alu: legajo_alu },
            success: function(data) {
                // Limpia las opciones actuales del segundo select
                $('#cuota').empty();

                // Agrega la opción predeterminada
                $('#cuota').append('<option value="0" selected>---Seleccionar cuota---</option>');

                // Agrega las opciones obtenidas desde el servidor
                $.each(data, function(index, cuota) {
                    $('#cuota').append('<option value="' + cuota.id + '" data-element-data=' + JSON.stringify(cuota) + '>' + cuota.mes + '</option>');
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

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
