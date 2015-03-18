/* Copyright (c) 2015 Coderdiaz, dev
 * Author: Javier Diaz
 * E-mail: coderdiaz@gmail.com
 * Project: SILOCOM
 */

$.fn.reset = function() {
	$(this).each(function() { this.reset(); });
};

var app = {

	chosen : {
		'.chosen-select'           : {width:"100%"},
    '.chosen-select-deselect'  : {allow_single_deselect:true},
    '.chosen-select-no-single' : {disable_search_threshold:10},
    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
    '.chosen-select-width'     : {width:"95%"}
	},

	initialization: function() {
		// Init events
		for (var selector in app.chosen) {
      $(selector).chosen(app.chosen[selector]);
    }
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
	},

	getSingerResponse: function(formdata) {
		$.ajax({
			'url': '/singers/new',
			'type': 'POST',
			'dataType': 'json',
			'data': formdata
		}).done(function(response) {
			console.log(response);
			if(response.status == false) {
				if(response.errors != '') {
					$('#alert_singer').html('');
					$('#alert_singer').append(response.errors.singer);
					$('#alert_singer').removeClass('hide');
				}else{

				}
			}else{
				$('#new_singer').reset();
				$('#newsinger').modal('hide');
				var n = noty({
					layout: 'bottomCenter',
					type: 'success',
					text: 'Artista agregado correctamente',
					theme: 'defaultTheme',
					animation: {
						open: 'animated bounceIn', // Animate.css class names
						close: 'animated bounceOut', // Animate.css class names
						easing: 'swing', // unavailable - no need
						speed: 500 // unavailable - no need
					},
					closeWith: ['click']
				});
				$('#singers_table').dataTable()._fnAjaxUpdate();
			}
		}).fail(function(jqXHR, textStatus) {
			console.log('Request: ' + JSON.stringify(jqXHR) + ' : ' + textStatus);
		});
	},

	newSongData: function() {

		var formdata = new FormData($('#new_song')[0]);

		$.ajax({
			url: '/songs/new',
			type: 'POST',
			dataType: 'json',
			data: formdata,
	    contentType: false,
	    processData: false,
		}).done(function(data) {
			console.log(data);
		}).fail(function(jqXHR, textStatus) {
			console.log('Request: ' + JSON.stringify(jqXHR) + ' : ' + textStatus);
		});
	}

};
