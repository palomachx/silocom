/* Copyright (c) 2015 Coderdiaz, dev
 * Author: Javier Diaz
 * E-mail: coderdiaz@gmail.com
 * Project: SILOCOM
 */

$(function(){

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

});
