<?php $this->load->view('templates/header') ?>

<body class="graystrong">
	<?php $this->load->view('templates/navbar') ?>
	<div class="clearfix"></div>
	<div class="container-fluid left-sidebar s3-loader">
		<iframe id="dynamic_frame" src="/dashboard" class="frame-fullscreen"></iframe>
	</div>

<?php $this->load->view('templates/footer') ?>
