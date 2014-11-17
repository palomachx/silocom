<?php $this->load->view('header'); ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<form role="form" id="loginForm">
					<div class="form-group">
						<img src="<?=base_url('assets/img/logo.png');?>" style="width: 100%;padding-left: 20px;" />
					</div>
					<div class="panel panel-default col-lg-8 col-lg-offset-2">
						<div class="panel-body panel-inputype">
							<div class="form-group">
								<input class="col-lg-12 form-control" id="usuario" name="user" type="text" placeholder="" />
							</div>
							<div class="form-group">
								<input class="col-lg-12 form-control" id="contrasena" name="pass" type="password" placeholder="" />
							</div>
							<div class="form-group">
								<input class="btn btn-danger col-lg-12 form-control" id="btnEnviar" type="submit" class="btn btn-danger" value="Iniciar Sesión" />
							</div>
						</div>
					</div>					
				</form>
			</div>
		</div>
		<div class="row" id="copyright">
			<div class="col-lg-6 col-lg-offset-3">
				<p><b><a href="mailto:palomachx@gmail.com">Soporte: palomachx@gmail.com</a></b></p>
			</div>
		</div>
	</div>

<?php $this->load->view('footer'); ?>