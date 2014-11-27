$(document).ready(function(){

	/* Evento para iniciar session */
	$('#btnEnviar').on('click', function(e){
		e.preventDefault();
		var usuario = $('#usuario').val();
		var ctranse = $('#contrasena').val();
		$.ajax({
			url: 'index.php/welcome/appLogin',
			dataType: 'json', 
			type: 'POST',
			data: {user: usuario, pass: ctranse},
			success: function(response){
				console.log(response);
				if(response.status == 1){
					location.href='index.php/dashboard';
				}else{
					sweetAlert("Oops...", response.message, "error");
				}
			}
		});
	});

	/* Evento para cerrar sesion */
	$('#closesession').on('click', function(e){
		e.preventDefault();
		swal({   
			title: "Estás seguro?",   
			text: "Estas por cerrar tu sesión",   
			type: "warning",   showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			cancelButtonText: "Cancelar",
			confirmButtonText: "Si, cerrar!",   
			closeOnConfirm: true
		}, function(){   
				
				// Si confirman ;
				$.ajax({
					url: 'welcome/killsession',
					success: function(){
						location.href="";
					}
				});

		});
	});


	var tablasongs = $('#allsongs').DataTable({
		"language": {
			"sLengthMenu": "Mostrar _MENU_ registros",
			"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros.",
			"sSearch": "Buscar: ",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Ultimo",
				"sNext": "Siguiente",
				"sPrevious" : "Anterior"
			}
		}
	});
	$('#allsongs')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered table-hover');
	$.ajax({
		url: 'dashboard/getSongs',
		dataType: 'json',
		type: 'GET',
		success: function(response){
			console.log(response);
			$.each(response, function(i, object){
				var datos = [];
				var i = 0;
				$.each(object, function(key, value){
					datos[i] = value;
					i++;
				});
				tablasongs.row.add([
					datos[0],
					datos[1],
					datos[2],
					datos[3],
					datos[5],
					datos[6],
					datos[7],
					datos[8]
					]).draw();
			});
		}
	});

	$('#browsersubmit').keydown(function(e){

		var valor = $(this).val(); // Obtengo el valor que contiene el input ;
		$('#allsongs_filter input').val(valor);
		if ( e.which == 13 ) {
	  	e.preventDefault();
	  }

	});

});