/* Copyright (c) 2015 Coderdiaz, dev
 * Author: Javier Diaz
 * E-mail: coderdiaz@gmail.com
 * Project: SILOCOM
 */

$(function(){

	// Events jQuery

	/* Loading data-slider */
	$('#progress_song').slider({
		formatter: function(value) {
			return 'Current value: ' + value;
		}
	});

	$('#form_login').submit(function(e) {
		e.preventDefault();
		app.getlogin($(this).serialize());
	});

});