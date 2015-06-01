<?php $this->load->view('templates/header') ?>

<body class="graystrong animated fadeIn">
	<?php $data['lista'] = $lista; ?>
	<?php $this->load->view('templates/list-playlist', $data); ?>
	<?php $this->load->view('templates/navbar') ?>
	<div class="clearfix"></div>
	<div class="container-fluid left-sidebar s3-loader">
		<iframe id="dynamic_frame" src="/dashboard" class="frame-fullscreen"></iframe>
	</div>
	<!-- Reproductor de Música Silocom -->
	<?php $this->load->view('templates/music.php'); ?>

	<!-- <div class="notify alert animated bounceIn default" role="alert">
		<div class="main-notify">
			<h6 class="label-notify">Notification</h6>
			<p class="notify-info">This is a one notification example</p>
		</div>
		<a class="close-notify close" data-dismiss="alert" aria-label="Close" href="#"><span class="icon-cross"></span></a>
	</div> -->

	<!-- A Modal -->
	<div id="modal-create-playlist" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Nueva Playlist</h4>
				</div>
				<div class="modal-body">
					<form id="form_save">
						<div class="form-group">
							<input id="playname" class="form-control" type="text" name="model_playlist" placeholder="Nombre de la Playlist">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button id="btnSavePlaylist" type="button" class="btn btn-primary">Guardar Playlist</button>
				</div>
			</div>
		</div>
	</div>

<?php $this->load->view('templates/global.php'); ?>
<?php $this->load->view('templates/scripts.php'); ?>
<?php $this->load->view('templates/musicjs.php'); ?>
<?php $this->load->view('templates/footer'); ?>
