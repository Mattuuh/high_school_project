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
}

$(function() {
    table = $('#tabla-horarios').DataTable(configurationDataTable);

	/* $('#consultar').on('click', function() {
		// Realizar la búsqueda utilizando Ajax
		console.log('ar')
		$.get('/buscar', {filtro: $('#filtro').val()}, function(data) {
			console.log(data)
			// Limpiar la tabla y agregar los nuevos datos
			//table.clear().rows.add(data).draw();
		});
	}); */
	
});

$(document).ready(function() {
	$('.materia').on('change', function() {
		// Obtén el valor seleccionado
		var id = $(this).attr('id');
		var value = $(this).val();
		var matches = id.match(/\[(.*?)\]/);
		matchValue = matches[1];
		var dia = $(this).attr('dia');
		
		var docentesConMatch = $('.docente').filter(function() {
			return this.id.includes(matchValue) && $(this).attr('dia') == dia;
		});

		docenteSelect = docentesConMatch[0];

		$.ajax({
			url: '/panel/obtenerDocentes', // Reemplaza con la URL de tu controlador
			method: 'GET', // Puedes ajustar el método según tus necesidades
			data: { id: value },
			success: function(data) {
                //console.log('success', data);
				$(docenteSelect).empty();

				$(docenteSelect).append('<option value="0" selected>-Seleccionar docente-</option>');

				$.each(data, function(index, docente) {
					$(docenteSelect).append('<option value="' + docente.id + '" data-element-data=' + JSON.stringify(docente) + '>' + docente.nombre + ' ' + docente.apellido + '</option>');
				});
			},
			error: function(error) {
				console.log('error', error);
			}
		});

		if (this.value != 0) {
			setTimeout(function() {
            	$(docenteSelect).removeAttr('hidden');
        	}, 500);
		} else {
			$(docenteSelect).attr('hidden', 'hidden');
		}
	});

})