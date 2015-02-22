<?php $this->load->view('templates/header') ?>

<body id="background">	
	<div id="logtemplate">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4">
					<center><img src="public/img/logotype.png" class="" width="370" /></center>
					<div class="panel-login col-lg-12">
						<form>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Nombre de Usuario" />
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Contraseña" />
							</div>
							<button type="submit" class="btn-submit col-lg-12 btn btn-primary btn-clean-pink right">Acceder a la Plataforma</button>
						</form>
					</div>
					<div class="clearfix"></div>
					<div class="remember">
						<span class="text-center col-lg-12"><a href="#!">¿Olvidaste tu contraseña?</a></span>
						<span class="text-center col-lg-12">Copyright (c) Silocom, dev. Versión en Desarrollo</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php $this->load->view('templates/footer') ?>