<?php $this->load->view('templates/header') ?>

<body>
	<div class="vertical grid-frame">
		<div class="row">
			<div class="head_title">
				<div class="col-lg-8">
					<span class="app_name">Silocom <span class="rolname">v1.0.0</span></span>
				</div>
				<div class="col-lg-4">
					<ul class="list-inline right">
						<li><span class="glyphicon glyphicon-plus"></span></li>
						<li><span class="rolname">Paloma Cor</span></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="dash-content padded">
			<div class="row">
				<div class="sidebar col-lg-2">
					<br />
					<ul class="nav_sidebar">
						<li class="labels">Inicio</li>
						<li><a class="active" href="#">Dashboard</a></li>
						<li class="labels">Música</li>
						<li><a href="#">Artistas</a></li>
						<li><a href="#">Géneros</a></li>
						<li><a href="#">Canciones</a></li>
						<li class="labels">Personal</li>
						<li><a href="#">Playlist</a></li>
					</ul>
				</div>
				<div class="col-lg-10">Dos</div>
			</div>
		</div>

		<div class="player">
			<div class="row">
				<div class="col-lg-3">
					<span class="glyphicon glyphicon-backward"></span>
					<span class="glyphicon glyphicon-play"></span>
					<span class="glyphicon glyphicon-forward"></span>
					<span style="overflow: hidden;">피노키오 - 로이킴 (Roy Kim)</span>
				</div>
				<div class="col-lg-6">
					<input id="progress_song" data-slider-id='slider-song' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>
				</div>
				<div class="col-lg-3">
					<span class="text-right col-lg-12"><a href="#!"><span class="glyphicon glyphicon-menu-hamburger"></span> Cola de Reproducción</a></span>
				</div>
			</div>
		</div>

	</div>

<?php $this->load->view('templates/footer') ?>