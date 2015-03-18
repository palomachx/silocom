/* Copyright (c) 2015 Coderdiaz, dev
 * Author: Javier Diaz
 * E-mail: coderdiaz@gmail.com
 * Project: SILOCOM
 */

$(function(){

	app.initialization();

	/* Section to Login */

	$('#form_login').submit(function(e) {
		e.preventDefault();
		app.getlogin($(this).serialize());
	});

	/* Section to Singers */

	$('#singers_table').dataTable({
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

	/* Section to Songs */
	$('#songs_table').dataTable({
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
		]
	});

	$('#song_registre').on('click', function(e){
		e.preventDefault();
		app.newSongData();
	});

});
