<?php $this->load->view('templates/header') ?>

<body class="graystrong animated fadeIn">
  <!-- <?php $this->load->view('templates/navbar') ?> -->
  <div class="clearfix"></div>
  <div class="container-fluid left-sidebar s3-loader">
    <div class="row">
      <div class="row">
        <div class="col-lg-12 dropdown">
          <h1 class="title-section">Canciones <a href="#!" class="btn-outline" data-toggle="modal" data-target="#newsong">Agregar una canción</a></h1>
          <br />
          <table id="songs_table" class="display theme-datatable" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th></th>
                <th>#</th>
                <th>Nombre</th>
                <th>Año</th>
                <th>Duración</th>
                <th>Disquera</th>
                <th>Tipo</th>
                <th>Género</th>
                <th>Artista/as</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th></th>
                <th>#</th>
                <th>Nombre</th>
                <th>Año</th>
                <th>Duración</th>
                <th>Disquera</th>
                <th>Tipo</th>
                <th>Género</th>
                <th>Artista/as</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal for new song -->
  <div class="modal fade" id="newsong" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Registro de nueva Canción</h4>
        </div>
        <div class="modal-body">
          <form id="new_song" enctype="multipart/form-data">
            <br />
            <div class="form-group col-lg-12 a-name">
              <label>Nombre de la Canción <span class="required-span">*</span></label>
              <input type="text" name="song_name" class="form-control" />
              <div class="label-error hide"></div>
              <br />
            </div>
            <div class="form-group col-lg-4 a-anno">
              <label>Año <span class="required-span">*</span></label>
              <select class="form-control" name="song_anno">
                <option value="" selected>Seleccione</option>
                <?php for($anio=(date("Y")); 1980<=$anio; $anio--): ?>
                  <option value="<?=intval($anio)?>"><?=intval($anio)?></option>
                <?php endfor; ?>
              </select>
              <div class="label-error hide"></div>
              <br />
            </div>
            <div class="form-group col-lg-4 a-duration">
              <label>Duración <span class="required-span">*</span></label>
              <input type="text" name="song_duration" class="form-control" placeholder="00:00" />
              <div class="label-error hide"></div>
              <br />
            </div>
            <div class="form-group col-lg-4 a-genero">
              <label>Género <span class="required-span">*</span></label>
              <select class="chosen-select" name="song_genero">
                <option value="" selected>Seleccione</option>
                <?php foreach($generos as $row): ?>
                  <option value="<?=$row['gen_id']?>"><?=$row['gen_name']?></option>
                <?php endforeach; ?>
              </select>
              <div class="label-error hide"></div>
              <br />
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-4 a-tipo">
              <label>Tipo <span class="required-span">*</span></label>
              <select class="chosen-select" name="song_tipo">
                <option value="" selected>Seleccione</option>
                <?php foreach($tipos as $row): ?>
                  <option value="<?=$row['tip_id']?>"><?=$row['tip_name']?></option>
                <?php endforeach; ?>
              </select>
              <div class="label-error hide"></div>
              <br />
            </div>
            <div class="form-group col-lg-8 a-artista">
              <label>Artistas <span class="required-span">*</span></label>
              <select class="chosen-select" multiple name="song_artistas[]">
                <?php foreach($artistas as $row): ?>
                  <option value="<?=$row['art_id']?>"><?=$row['art_name']?></option>
                <?php endforeach; ?>
              </select>
              <div class="label-error hide"></div>
              <br />
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-6 a-file" id="clicaqui">
              <label>Adjunta el archivo <span class="required-span">*</span></label>
              <input id="#files" type="file" name="file">
              <div class="label-error hide"></div>
            </div>
            <div class="form-group col-lg-6 a-disquera">
              <label>Disquera <span class="required-span">*</span></label>
              <select class="chosen-select" name="song_disquera">
                <option value="" selected>Seleccione</option>
                <?php foreach($disqueras as $row): ?>
                  <option value="<?=$row['dis_id']?>"><?=$row['dis_name']?></option>
                <?php endforeach; ?>
              </select>
              <div class="label-error hide"></div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-12">
              <label>Letra</label>
              <textarea rows="10" class="form-control" name="song_letra" placeholder="Escribe la letra de la canción..."></textarea>
              <div class="label-error hide"></div>
            </div>
            <div class="clearfix"></div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" id="song_registre" class="btn btn-primary">Registrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Structure -->

<?php $this->load->view('templates/scripts.php'); ?>
<?php $this->load->view('templates/silocom.php'); ?>
<?php $this->load->view('templates/footer'); ?>
