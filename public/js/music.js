
/* Funciones para media player */ 
globals.music = {
	
	wavesurfer: {},

	status_play: {},

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
			$(parentp[0]).removeClass('icon-pause').addClass('icon-play');
		}else{
			globals.music.status_play = true;
			var parentp = $('#play').children();
			$(parentp[0]).removeClass('icon-play').addClass('icon-pause');
		}
	},

	labels: function(singer, song) {
		$('#singer-label p').remove().empty();
		$('#song-label p').remove().empty();
		$('#singer-label').html('<p>' + singer + '</p>');
		$('#song-label').html('<p>' + song + '</p>');
	}

};

/* 
 * Eventos del reproductor de música
 */
$(function(){

	globals.music.init();
	
	globals.music.wavesurfer.on('ready', function() {
		globals.music.status_play = true;
		globals.music.wavesurfer.play();
		$('#wave').attr('style', 'position: absolute; width: 100%;');
    var parentp = $('#play').children();
		$(parentp[0]).removeClass('icon-play').addClass('icon-pause');
	});

	globals.music.wavesurfer.on('finish', function() {
		var parentp = $('#play').children();
		$(parentp[0]).removeClass('icon-pause').addClass('icon-play');
	});

	$('#play').on('click', function(e) {
		e.preventDefault();
		globals.music.pause();
	});

	$('#forward').on('click', function(e) {
		e.preventDefault();
		globals.music.load('public/uploads/18 - ZerypheshTwilight.mp3');
	});

});