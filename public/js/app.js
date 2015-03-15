/* Copyright (c) 2015 Coderdiaz, dev
 * Author: Javier Diaz
 * E-mail: coderdiaz@gmail.com
 * Project: SILOCOM
 */

var app = {

	initialization: function() {
		// Init events
	},

	getlogin: function(formdata) {
		$.ajax({
			url: '/login',
			type: 'POST',
			dataType: 'json',
			data: formdata,
		}).done(function(response) {
			console.log('Response: ' + JSON.stringify(response));
			if(response.status == false) {
				if(response.errors != '') {
					$('#errors').html('');
					$('#errors').append(response.errors.username + ' ' + response.errors.password);
					$('#errors').removeClass('hide');
				}else{
					$('#errors').addClass('hide');
					swal('Ups!', 'Nombre de Usuario y/o Contraseña Incorrectos', 'error');
				}
			}else{
				location.href='/dashboard';
			}
		}).fail(function(jqXHR, textStatus){
			console.log('Request: ' + JSON.stringify(jqXHR) + ' : ' + textStatus);
		});
	}

};