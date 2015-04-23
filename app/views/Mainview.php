<?php $this->load->view('templates/header') ?>

<body class="graystrong">
	<?php $data['lista'] = $lista; ?>
	<?php $this->load->view('templates/list-playlist', $data); ?>
	<?php $this->load->view('templates/navbar') ?>
	<div class="clearfix"></div>
	<div class="container-fluid left-sidebar s3-loader">
		<iframe id="dynamic_frame" src="/dashboard" class="frame-fullscreen"></iframe>
	</div>
	<!-- Reproductor de Música Silocom -->
	<?php $this->load->view('templates/music.php'); ?>

<?php $this->load->view('templates/global.php'); ?>
<?php $this->load->view('templates/scripts.php'); ?>
<?php $this->load->view('templates/musicjs.php'); ?>
<?php $this->load->view('templates/footer'); ?>
