/* Copyright (c) 2015 Coderdiaz, dev
 * Author: Javier Diaz
 * E-mail: coderdiaz@gmail.com
 * Project: SILOCOM
 */

$(function(){

	app.initialization();

	/* Sección para Inicio de Sesión */

	$('#form_login').submit(function(e) {
		e.preventDefault();
		app.getlogin($(this).serialize());
	});

	/* 
	 * Sección para cambiar el status activo de las Navbar 
	 * respecto a la opción que se seleccione, cambie además el iframe
	 * y lo carga con nuevo contenido.
	 */

	$('a').on('click', function(e) {
		e.preventDefault();
		var uri = $(this).data('href');
		$('.item').removeClass('active');
		var pp = $(this).parent();
		var cl_name = pp[0].className;
		if(cl_name == 'item') {
			$('#dynamic_frame').attr("src", uri);
			$(this).parent().addClass('active');	
		}
	});

	/* Seccion para Cantantes */

	var cantantes = $('#singers_table').dataTable({
		/* 'processing': true, */
		ajax: 'singers/all',
		columns: [
			{'data': 'art_id'},
			{'data': 'art_name'}
		]
	});

	$('#singer_registre').on('click', function(e) {
		e.preventDefault();
		app.getSingerResponse($('#new_singer').serialize());
	});

	/* Secccion para Canciones */

	var canciones = $('#songs_table').dataTable({
		/* 'processing': true, */
		ajax: 'songs/all',
		columns: [
			{'data': 'can_id'},
			{'data': 'can_name'},
			{'data': 'can_anno'},
			{'data': 'can_duracion'},
			{'data': 'dis_name'},
			{'data': 'tip_name'},
			{'data': 'gen_name'},
			{'data': 'authors'}
		],
		columnDefs: [
			{render: function(data, type, row){
				return data[0] + '<a class="hide" href=""><span class="icon-play"></span></a>';
			}, targets: 0}
		],
	});

	$('#song_registre').on('click', function(e){
		e.preventDefault();
		app.newSongData();
	});

	/* Seccion para Usuarios */
	var users = $('#users_table').dataTable({
		/* 'processing': true, */
		ajax: 'users/all',
		columns: [
			{'data': 'us_username'},
			{'data': 'us_name'},
			{'data': 'us_apep'},
			{'data': 'us_apem'},
			{'data': 'rol_id'},
			{'data': 'us_date'}
		]
	});

	$('#user_registre').on('click', function(e) {
		e.preventDefault();
		app.newuserData();
	});

	/* Sección para Generos */
	var genres = $('#genres_table').dataTable({
		ajax: 'genres/all',
		columns: [
			{'data': 'gen_id'},
			{'data': 'gen_name'}
		]
	});

	$('#genre_registre').on('click', function(e) {
		e.preventDefault();
		app.newgenreData();
	});

	/* Seccion para Tipos */
	var types = $('#types_table').dataTable({
		ajax: 'types/all',
		columns: [
			{'data': 'tip_id'},
			{'data': 'tip_name'},
			{'data': 'tip_description'}
		]
	});

	$('#type_registre').on('click', function(e) {
		e.preventDefault();
		app.newtypeData();
	});

	/* Seccion para Disqueras */
	var labels = $('#labels_table').dataTable({
		ajax: 'labels/all',
		columns: [
			{'data': 'dis_id'},
			{'data': 'dis_name'}
		]
	});

	$('#label_registre').on('click', function(e) {
		e.preventDefault();
		app.newLabelData();
	});

});
