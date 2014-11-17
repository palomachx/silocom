<?php $this->load->view('header2'); ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2" id="columnSidebar">
				<div class="row">
					<img src="<?=base_url('assets/img/logo.png');?>" style="width: 100%;padding: 15px;" />
				</div>
				<div class="row">
					<div class="col-lg-12">
						<ul class="list-group" id="ulModList">
						  <li class="list-group-item"><a href="#"><span class="icon-dashboard"></span>Dashboard</a></li>
						  <li class="list-group-item"><a href="#"><span class="icon-headphones"></span>Música</a></li>
						  <li class="list-group-item"><a href="#"><span class="icon-search"></span>Busqueda</a></li>
						  <li class="list-group-item"><a href="#"><span class="icon-copy3"></span>Reportes</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-10" style="float: right;">
				<div class="row">
					<div class="col-lg-10">
						<span class="icon-list5" style="position: absolute; right: 15px; top: 15px; color: white; font-size: 25px;"></span>
					</div>
					<div class="col-lg-2" style="position: fixed; right: 0; width: 220px; height: 100%; background: #181D24; box-shadow: inset 3px 0px 10px #0E0E0E;">
						<div class="row">
							<div class="col-lg-12">
								<a href="#" class="btn col-lg-12 btn-link" style="position: relative;padding-top: 30px;">
									<div class="avatar" style="padding-bottom: 10px;">
										<img src="<?=base_url('assets/img/thumb.jpg');?>" style="border-radius: 50%; box-shadow: 0px 3px 5px #0C0C0C;">
									</div>
									palomachx
								</a>
							</div>
						</div>
					</div>
					</div>
			</div>
			
		</div>
	</div>

<?php $this->load->view('footer'); ?>