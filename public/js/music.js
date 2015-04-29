
/* Funciones para media player */
globals.music = {

	wavesurfer: {},

	status_play: {},

	data_row: {},

	init: function(){
		globals.music.wavesurfer = Object.create(WaveSurfer);
		globals.music.wavesurfer.init({
			container: document.querySelector('#wave'),
	    waveColor: 'rgb(119, 22, 55)',
	    progressColor: 'rgb(204, 33, 90)',
	    backend: 'AudioElement' // Primero carga el audio y despues renderiza el wavedraw.
		});
	},

	load: function(songURI) {
		globals.music.wavesurfer.load('public/uploads/' + songURI);
	},

	pause: function() {
		globals.music.wavesurfer.playPause();
		if(globals.music.status_play){
			globals.music.status_play = false;
			var parentp = $('#play').children();
			$(parentp[0]).removeClass('glyphicon glyphicon-pause').addClass('glyphicon glyphicon-play');
		}else{
			globals.music.status_play = true;
			var parentp = $('#play').children();
			$(parentp[0]).removeClass('glyphicon glyphicon-play').addClass('glyphicon glyphicon-pause');
		}
	},

	labels: function(singer, song) {
		$('#singer-label p').remove().empty();
		$('#song-label p').remove().empty();
		$('#singer-label').html('<p>' + singer + '</p>');
		$('#song-label').html('<p>' + song + '</p>');
	},

	mousex: function(e) {
		return e.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
		// globals.music.mousey = e.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
		// console.log(globals.music.mousex + ' , ' + globals.music.mousey);
	},

	mousey: function(e) {
		return e.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
	},

	activatedropdown: function(x,y, row) {
		$('.dropdown').addClass('open');
		$('#dropdown-playlist').css('left',x).css('top',y);
		$('#edit-song').attr('data-id-song', row.can_id);
		$('#remove-song').attr('data-id-song', row.can_id);
		globals.music.data_row = row;
		// console.log(globals.music.data_row);
	},

	desactivatedropdown: function() {
		$('.dropdown').removeClass('open');
	}

};

/*
 * Eventos del reproductor de música
 */
$(function(){

	$(window, document, 'iframe').on('click', function(e) {
		$('.dropdown').removeClass('open');
	});

	globals.music.init();

	$('iframe').niceScroll();

	globals.music.wavesurfer.on('ready', function() {
		globals.music.status_play = true;
		globals.music.wavesurfer.play();
		$('#wave').attr('style', 'position: absolute; width: 100%;');
    var parentp = $('#play').children();
		$(parentp[0]).removeClass('icon-play').addClass('glyphicon glyphicon-pause');
	});

	globals.music.wavesurfer.on('finish', function() {
		var parentp = $('#play').children();
		$(parentp[0]).removeClass('glyphicon glyphicon-pause').addClass('icon-play');
	});

	$('#play').on('click', function(e) {
		e.preventDefault();
		globals.music.pause();
	});

	$('#forward').on('click', function(e) {
		e.preventDefault();
		// globals.music.load('public/uploads/18 - ZerypheshTwilight.mp3');
	});

	/* Scroll Event */
	console.log($('#playlist').height());
	var height = $('#playlist').height();
	$('#l_playlist').css('height', height-206);
	$('#l_playlist').niceScroll();

	$(window).resize(function() {
		console.log($('#playlist').height());
		var height = $('#playlist').height();
		$('#l_playlist').css('height', height-206);
		$('#l_playlist').niceScroll();
	});

});
