<?php $this->load->view('templates/header') ?>

<body class="graystrong">
  <!-- <?php $this->load->view('templates/navbar') ?> -->
  <div class="clearfix"></div>
  <div class="container-fluid left-sidebar s3-loader">
    <div class="row">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="title-section">Usuarios <a href="#!" class="btn-outline" data-toggle="modal" data-target="#newuser">Agregar un nuevo usuario</a></h1>
          <br />
          <table id="users_table" class="display theme-datatable" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Username</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Rol del usuario</th>
                <th>Fecha de alta </th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Username</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Rol del usuario</th>
                <th>Fecha de alta </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal for new song -->
  <div class="modal fade" id="newuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Registro de Nuevo Usuario</h4>
        </div>
        <div class="modal-body">
          <form id="new_user">
            <div class="form-group col-lg-6 a-username">
              <label>Nombre de Usuario <span class="required-span">*</span></label>
              <input type="text" name="user_name" class="form-control" />
              <div class="label-error hide"></div>
            </div>
            <div class="form-group col-lg-6 a-rol">
              <label>Rol <span class="required-span">*</span></label>
              <select class="chosen-select" name="user_rol">
                <option value="" selected>Seleccione</option>
                <?php foreach($roles as $row): ?>
                  <option value="<?=$row['rol_id']?>"><?=$row['rol_name']?></option>
                <?php endforeach; ?>
              </select>
              <div class="label-error hide"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-4 a-name">
              <label>Nombre <span class="required-span">*</span></label>
              <input type="text" name="user_nombre" class="form-control" />
              <div class="label-error hide"></div>
            </div>
            <div class="form-group col-lg-4 a-apep">
              <label>Apellido Paterno <span class="required-span">*</span></label>
              <input type="text" name="user_apep" class="form-control" />
              <div class="label-error hide"></div>
            </div>
            <div class="form-group col-lg-4 a-apem">
              <label>Apellido Materno <span class="required-span">*</span></label>
              <input type="text" name="user_apem" class="form-control" />
              <div class="label-error hide"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-6 a-pass">
              <label>Contraseña <span class="required-span">*</span></label>
              <input type="password" name="user_pass" class="form-control" />
              <div class="label-error hide"></div>
            </div>
            <div class="form-group col-lg-6 a-repeat_pass">
              <label>Repite Contraseña<span class="required-span">*</span></label>
              <input type="password" name="user_repeat_password" class="form-control" />
              <div class="label-error hide"></div>
            </div>
            <div class="clearfix"></div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" id="user_registre" class="btn btn-primary">Registrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Structure -->

<?php $this->load->view('templates/footer') ?>
