<?php $this->load->view('templates/header') ?>

<body id="background">	
	<div id="logtemplate">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4">
					<div class="login-panel">
						<div class="logotype">
							<img src="public/img/logotype.png" width="80%" />
						</div>
						<div class="form">
							<form>
								<div class="form-group">
									<input type="text" class="form-control" name="username" placeholder="Nombre de Usuario" />
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="passwd" placeholder="Contraseña" />
								</div>
								<div class="form-group">
									<button class="btn btn-success col-lg-12" type="submit">Login</button>
								</div>
							</form>
						</div>
						<div class="footpanel text-center">
							<span >&copy; Silocom @ Development </span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php $this->load->view('templates/footer') ?>