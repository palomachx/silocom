<?php $this->load->view('templates/header') ?>

<body class="graystrong">
  <!-- <?php $this->load->view('templates/navbar') ?> -->
  <div class="clearfix"></div>
  <div class="container-fluid left-sidebar s3-loader">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="title-section">Disqueras <a href="#!" class="btn-outline" data-toggle="modal" data-target="#newlabel">Agregar una Disquera</a></h1>
        <br />
        <table id="labels_table" class="display theme-datatable" cellspacing="0" width="100%">
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
  <!-- Modal for new label -->
  <div class="modal fade" id="newlabel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Registro de nuevo artista</h4>
        </div>
        <div class="modal-body">
          <form id="new_label">
            <div class="form-group">
              <label>Nombre de la Disquera</label>
              <input type="text" name="label" class="form-control" />
              <br />
              <div id="alert_label" class="alert alert-danger hide" role="alert"></div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" id="label_registre" class="btn btn-primary">Registrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Structure -->

<?php $this->load->view('templates/scripts.php'); ?>
<?php $this->load->view('templates/footer') ?>
