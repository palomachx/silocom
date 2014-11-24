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


	$('#browsersubmit').keydown(function(e){
		if ( e.which == 13 ) {
	  	e.preventDefault();
	  }
		$.ajax({
			url: 'dashboard/getSongs',
			type: 'GET',
			dataType: 'json',
			success: function(response) {
				console.log(response);
			}
		});
	});

});