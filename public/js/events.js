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

	$('ul.nav li.item a').on('click', function(e) {
		e.preventDefault();
		var uri = $(this).data('href');
		if(uri == '/playlist'){
			if($(this).parent().hasClass('active')){
				$('#playlist').removeClass('slide').css('left','0px');
				$(this).parent().removeClass('active');
				$('.before').addClass('active');
			} else {
				$('#playlist').addClass('slide');
				$('.item').removeClass('active');
				$(this).parent().addClass('active');
			}
		}else{
			$('.item').removeClass('active');
			var pp = $(this).parent();
			var cl_name = pp[0].className;
			if(cl_name == 'item') {
				$('#dynamic_frame').attr("src", uri);
				$(this).parent().addClass('active');
				$('.before').removeClass('before');
				$(this).parent().addClass('before');
			}
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
			{'data': null},
			{'data': null},
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
				return '<button class="zone hide" data-name="' + row.can_name + '" data-singer="' + row.authors + '" data-song="' + row.can_ruta + '"><i class="glyphicon glyphicon-play"></i></button>';
			}, targets: 0},
			{render: function(data, type, row) {
				return '<button id="add_pl" class="add_btn"><i class="icon-plus"></i></button>'
			}, targets: 1}
		],
	});

	$('#song_registre').on('click', function(e){
		e.preventDefault();
		app.newSongData();
	});

	$('#songs_table tbody').on('mouseenter', 'tr', function() {
		var element = $('td', this).eq(0).children();
		// console.log(element);
		$(element[0]).removeClass('hide');
	}).on('mouseleave', 'tr', function() {
		var element = $('td', this).eq(0).children();
		// console.log(element);
		$(element[0]).addClass('hide');
	});

	$('#songs_table tbody').on('click', 'button.zone', function(e) {
		var element = $(this);
		window.parent.globals.music.pause();
		// console.log(childr);
		var uri = element[0].getAttribute('data-song');
		var name = element[0].getAttribute('data-name');
		var singer = element[0].getAttribute('data-singer');
		// console.log(window.parent.globals.music);
		window.parent.globals.music.labels(singer, name);
		window.parent.globals.music.load(uri);
		// console.log($(this));
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
