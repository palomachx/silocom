<?php $this->load->view('templates/header') ?>

<body class="graystrong">
  <!-- <?php $this->load->view('templates/navbar') ?> -->
  <div class="clearfix"></div>
  <div class="container-fluid left-sidebar s3-loader">
    <!-- Genres table -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="title-section">Géneros<a href="#!" class="btn-outline" data-toggle="modal" data-target="#newgenre">Agregar un Nuevo Género</a></h1>
        <br />
        <table id="genres_table" class="display theme-datatable" cellspacing="0" width="100%">
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
    </div><!-- / End Genre table -->
    <!-- Modal for new song -->
    <div class="modal fade" id="newgenre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Registro de nuevo género</h4>
          </div>
          <div class="modal-body">
            <form id="new_genre">
              <br />
              <div class="form-group col-lg-12 a-genre">
                <label>Nombre del Género <span class="required-span">*</span></label>
                <input type="text" name="genre_name" class="form-control" />
                <div class="label-error hide"></div>
                <br />
              </div>
              <div class="clearfix"></div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" id="genre_registre" class="btn btn-primary">Registrar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal Structure -->
    <div class="clearfix"></div>
    <!-- Type table -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="title-section">Tipos<a href="#!" class="btn-outline" data-toggle="modal" data-target="#newtype">Agregar un Nuevo Tipo</a></h1>
        <br />
        <table id="types_table" class="display theme-datatable" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Descripción</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Descripción</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div><!-- / End type table -->
  <!-- Modal for new song -->
    <div class="modal fade" id="newtype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Registro de nuevo tipo</h4>
          </div>
          <div class="modal-body">
            <form id="new_type">
              <br />
              <div class="form-group col-lg-12 a-type_name">
                <label>Nombre del Género <span class="required-span">*</span></label>
                <input type="text" name="type_name" class="form-control" />
                <div class="label-error hide"></div>
                <br />
              </div>
              <div class="form-group col-lg-12 a-type_des">
                <label>Descripción <span class="required-span"></span></label>
                <input type="text" name="type_des" class="form-control" />
                <div class="label-error hide"></div>
                <br />
              </div>
              <div class="clearfix"></div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" id="type_registre" class="btn btn-primary">Registrar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal Structure -->

<?php $this->load->view('templates/footer') ?>