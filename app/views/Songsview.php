<?php $this->load->view('templates/header') ?>

<body class="graystrong">
  <?php $this->load->view('templates/navbar') ?>
  <div class="clearfix"></div>
  <div class="container-fluid left-sidebar">
    <div class="row">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="title-section">Canciones <a href="#!" class="btn-outline" data-toggle="modal" data-target="#newsong">Agregar una canción</a></h1>
          <br />
          <table id="songs_table" class="display theme-datatable" cellspacing="0" width="100%">
            <thead>
              <tr>
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
            <div class="form-group col-lg-12">
              <label>Nombre de la Canción</label>
              <input type="text" name="song_name" class="form-control" />
              <br />
            </div>
            <div class="form-group col-lg-4">
              <label>Año</label>
              <select class="form-control" name="song_anno">
                <?php for($anio=(date("Y")); 1980<=$anio; $anio--): ?>
                  <option value="<?=intval($anio)?>"><?=intval($anio)?></option>
                <?php endfor; ?>
              </select>
              <br />
            </div>
            <div class="form-group col-lg-4">
              <label>Duración</label>
              <input type="text" name="song_duration" class="form-control" placeholder="00:00" />
              <br />
            </div>
            <div class="form-group col-lg-4">
              <label>Género</label>
              <select class="chosen-select" name="song_genero">
                <?php foreach($generos as $row): ?>
                  <option value="<?=$row['gen_id']?>"><?=$row['gen_name']?></option>
                <?php endforeach; ?>
              </select>
              <br />
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-4">
              <label>Tipo</label>
              <select class="chosen-select" name="song_tipo">
                <?php foreach($tipos as $row): ?>
                  <option value="<?=$row['tip_id']?>"><?=$row['tip_name']?></option>
                <?php endforeach; ?>
              </select>
              <br />
            </div>
            <div class="form-group col-lg-8">
              <label>Artistas</label>
              <select class="chosen-select" multiple name="song_artistas[]">
                <?php foreach($artistas as $row): ?>
                  <option value="<?=$row['art_id']?>"><?=$row['art_name']?></option>
                <?php endforeach; ?>
              </select>
              <br />
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-6">
              <label>Adjunta el archivo</label>
              <input class="form-control" type="file" name="file" />
            </div>
            <div class="form-group col-lg-6">
              <label>Disquera</label>
              <select class="chosen-select" name="song_disquera">
                <?php foreach($disqueras as $row): ?>
                  <option value="<?=$row['dis_id']?>"><?=$row['dis_name']?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-12">
              <label>Letra</label>
              <textarea rows="10" class="form-control" name="song_letra" placeholder="Escribe la letra de la canción..."></textarea>
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

<?php $this->load->view('templates/footer') ?>
