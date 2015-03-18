<?php $this->load->view('templates/header') ?>

<body class="graystrong">
  <?php $this->load->view('templates/navbar') ?>
  <div class="clearfix"></div>
  <div class="container-fluid left-sidebar">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="title-section">Artistas <a href="#!" class="btn-outline" data-toggle="modal" data-target="#newsinger">Nuevo</a></h1>
        <br />
        <table id="singers_table" class="display theme-datatable" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nombre</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal for new singer -->
  <div class="modal fade" id="newsinger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Registro de nuevo artista</h4>
        </div>
        <div class="modal-body">
          <form id="new_singer">
            <div class="form-group">
              <label>Nombre del Artista</label>
              <input type="text" name="singer" class="form-control" />
              <br />
              <div id="alert_singer" class="alert alert-danger hide" role="alert"></div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" id="singer_registre" class="btn btn-primary">Registrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Structure -->

<?php $this->load->view('templates/footer') ?>
