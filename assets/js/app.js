$(document).ready(function(){

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
			}
		});
	});

});