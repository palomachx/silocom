<?php $this->load->view('templates/header') ?>

<body id="background">	
	<div id="logtemplate">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<img src="public/img/logotype.png" class="right" width="410" />
				</div>
				<div class="col-lg-6">
					<div class="panel-login">
						<form>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Nombre de Usuario" />
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Contraseña" />
							</div>
							<button type="submit" class="btn-submit btn btn-primary btn-clean-pink right">Acceder a la Plataforma</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php $this->load->view('templates/footer') ?>