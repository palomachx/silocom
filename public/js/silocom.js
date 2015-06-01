$(function() {

  $('.container-datas').on('click', function(e) {
		e.preventDefault();
		window.parent.globals.music.desactivatedropdown();
		window.parent.globals.music.desactivatedNormalArtista();
	});

});
