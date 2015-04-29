/* Copyright (c) 2015 Coderdiaz, dev
 * Author: Javier Diaz
 * E-mail: coderdiaz@gmail.com
 * Project: SILOCOM
 */

$.fn.reset = function() {
	$(this).each(function() { this.reset(); });
};

var app = {

	mousex: {},

	mousey: {},

	canciones: {},

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
				location.href='/main';
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
					$('#alert_singer').addClass('hide');
				}
			}else{
				$('#new_singer').reset();
				$('#newsinger').modal('hide');
				app.message('Artista agregado correctamente', 'success','defaultTheme', 'bottomCenter');
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
			app.showErrorsSongform(data);
		}).fail(function(jqXHR, textStatus) {
			console.log('Request: ' + JSON.stringify(jqXHR) + ' : ' + textStatus);
		});

	},

	showErrorsSongform: function(data){
		var errors = 0;
		$.each(data, function(key, value) {
			switch(key){
				case 'name':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'anno':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'duration':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'genero':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'tipo':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'artista':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'file':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'disquera':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
			}
		});

		if(errors === 0 && data.success === true){
			$('#new_song').reset();
			$('#newsong').modal('hide');
			app.message('Canción Agregada correctamente', 'success','defaultTheme', 'bottomCenter');
			$('#songs_table').dataTable()._fnAjaxUpdate();
		}else if(data.success_validation === false) {
				app.message('Verifique los campos para continuar', 'warning','defaultTheme', 'bottomCenter');
		}else if(data.success === false){
			$('#new_song').reset();
			$('#newsong').modal('hide');
			app.message('Hubo un problema en la subida del archivo', 'alert','defaultTheme', 'bottomCenter');
		}
	},

	newuserData: function() {
		$.ajax({
			url: '/users/new',
			type: 'POST',
			dataType: 'json',
			data: $('#new_user').serialize()
		}).done(function(data) {
			app.showErrorsUserForm(data);
		}).fail(function(jqXHR, textStatus) {
			console.log('Request: ' + JSON.stringify(jqXHR) + ' : ' + textStatus);
		});
	},

	showErrorsUserForm: function(data) {
		var errors = 0;
		$.each(data, function(key, value) {
			switch(key){
				case 'username':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'rol':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'name':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'apep':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'apem':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'pass':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'repeat_pass':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
			}
		});

		if(errors === 0 && data.success === true){
			$('#new_user').reset();
			$('#newuser').modal('hide');
			app.message('Usuario Agregado Correctamente', 'success','defaultTheme', 'bottomCenter');
			$('#users_table').dataTable()._fnAjaxUpdate();
		}else if(data.success_validation === false) {
				app.message('Verifique los campos para continuar', 'warning','defaultTheme', 'bottomCenter');
		}else if(data.success === false){
			$('#new_song').reset();
			$('#newsong').modal('hide');
			app.message('Hubo un problema al registrar el usuario, intentalo más tarde.', 'alert','defaultTheme', 'bottomCenter');
		}

	},

	newgenreData: function() {
		$.ajax({
			url: '/genres/new',
			type: 'POST',
			dataType: 'json',
			data: $('#new_genre').serialize()
		}).done(function(data) {
			app.showErrorsGenreForm(data);
		}).fail(function(jqXHR, textStatus) {
			console.log('Request: ' + JSON.stringify(jqXHR) + ' : ' + textStatus);
		});
	},

	showErrorsGenreForm: function(data) {
		var errors = 0;
		console.log(data);
		$.each(data, function(key, value) {
			switch(key){
				case 'genre':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
			}
		});

		if(errors === 0 && data.success === true){
			$('#new_genre').reset();
			$('#newgenre').modal('hide');
			app.message('Genero Agregado Correctamente', 'success','defaultTheme', 'bottomCenter');
			$('#genres_table').dataTable()._fnAjaxUpdate();
		}else if(data.success_validation === false) {
				app.message('Verifique los campos para continuar', 'warning','defaultTheme', 'bottomCenter');
		}else if(data.success === false){
			$('#new_genre').reset();
			$('#newgenre').modal('hide');
			app.message('Hubo un problema al registrar el genero, intentalo más tarde.', 'alert','defaultTheme', 'bottomCenter');
		}
	},

	newtypeData: function(){
		$.ajax({
			url: '/types/new',
			type: 'POST',
			dataType: 'json',
			data: $('#new_type').serialize()
		}).done(function(data) {
			app.showErrorsTypesForm(data);
		}).fail(function(jqXHR, textStatus) {
			console.log('Request: ' + JSON.stringify(jqXHR) + ' : ' + textStatus);
		});
	},

	showErrorsTypesForm: function(data) {
		var errors = 0;
		console.log(data);
		$.each(data, function(key, value) {
			switch(key){
				case 'type_name':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
				case 'type_des':
					if(value == ''){
						$('.a-'+key).removeClass('has-error');
						$('.a-'+key+' .label-error').addClass('hide');
					}else{
						errors++;
						$('.a-'+key+' .label-error').html('');
						$('.a-'+key).addClass('has-error');
						$('.a-'+key+' .label-error').append(value).removeClass('hide');
					}
				break;
			}
		});

		if(errors === 0 && data.success === true){
			$('#new_type').reset();
			$('#newtype').modal('hide');
			app.message('Genero Agregado Correctamente', 'success','defaultTheme', 'bottomCenter');
			$('#types_table').dataTable()._fnAjaxUpdate();
		}else if(data.success_validation === false) {
				app.message('Verifique los campos para continuar', 'warning','defaultTheme', 'bottomCenter');
		}else if(data.success === false){
			$('#new_type').reset();
			$('#newtype').modal('hide');
			app.message('Hubo un problema al registrar el genero, intentalo más tarde.', 'alert','defaultTheme', 'bottomCenter');
		}
	},

	newLabelData: function() {
		$.ajax({
			'url': '/labels/new',
			'type': 'POST',
			'dataType': 'json',
			'data': $('#new_label').serialize()
		}).done(function(response) {
			console.log(response);
			if(response.status == false) {
				if(response.errors != '') {
					$('#alert_label').html('');
					$('#alert_label').append(response.errors.label);
					$('#alert_label').removeClass('hide');
				}else{
					$('#alert_label').addClass('hide');
				}
			}else{
				$('#new_label').reset();
				$('#newlabel').modal('hide');
				app.message('Disquera agregada correctamente', 'success','defaultTheme', 'bottomCenter');
				$('#labels_table').dataTable()._fnAjaxUpdate();
			}
		}).fail(function(jqXHR, textStatus) {
			console.log('Request: ' + JSON.stringify(jqXHR) + ' : ' + textStatus);
		});
	},

	/*
	 * Nombre: message
	 * Descripcion: Mensajes de Alertas con Noty.
	 * @param {string} message_data
	 * @param {string} type_data
	 * @param {string} theme_data
	 * @param {string} layout_data
	 */
	message: function(message_data, type_data, theme_data, layout_data){
		var n = noty({
			layout: layout_data,
			type: type_data,
			text: message_data,
			theme: theme_data,
			animation: {
				open: 'animated bounceIn', // Animate.css class names
				close: 'animated bounceOut', // Animate.css class names
				easing: 'swing', // unavailable - no need
				speed: 500 // unavailable - no need
			},
			closeWith: ['click']
		});
	}

};
