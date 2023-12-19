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
		{'orderable': false, 'targets': [4]}
	]
}

$(function() {
    table = $('#tabla-alumnos').DataTable(configurationDataTable);
});

$(document).ready(function() {
	table.column(3).data().unique().sort().each(function(value, index) {
		// var option = '<option value="' + value + '">' + value + '</option>';
		// if (index === 0) {
		// 	option = '<option value="' + value + '" selected>' + value + '</option>';
		// }
		// $('#filtroSelect').append(option);
        $('#filtroSelect').append('<option value="' + value + '">' + value + '</option>');
    });

      // Manejar el cambio en el select para aplicar el filtro
    $('#filtroSelect').on('change', function() {
        var filtroValor = $(this).val();
        table.column(3).search(filtroValor).draw();
    });
	
	$('#filtroSelect2').on('change', function() {
        var filtroValor = $(this).val();
        table.column(3).search(filtroValor).draw();
    });
	
	$('#botonFecha').on('click', function() {
        var filtroValor = $('#filtroFecha').val();
        table.column(5).search(filtroValor).draw();
    });

	$('#limpiarFiltros').on('click', function() {
		$('#filtroSelect2').val('0');
		$('#filtroFecha').val('');
		table.columns().search('').draw();
		/* filtroCurso = $('#filtroSelect').val();
		console.log(filtroCurso)
        table.column(3).search(filtroCurso).draw();
        filtroFecha = $('#filtroFecha').val('');
        table.column(5).search(filtroFecha).draw(); */
		console.log('arr')
    });
});

let configurationDataTable1 = {
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
		{'orderable': false, 'targets': [2]}
	]
}

$(function() {
    table1 = $('#tabla-asistencia').DataTable(configurationDataTable1);
});