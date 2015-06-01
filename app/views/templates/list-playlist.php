
  <div id="playlist" class="navbar navbar-inverse navbar-twitch" role="navigation">
    <div class="container">
      <div class="">
        <br />
        <ul class="nav navbar-nav">
          <p class="text-center label-top"><span>Playlists de <?=$lista->username;?></span></p>
          <li class="li-title-nav">
            <!-- <?php var_dump($lista); ?> -->
            <?php if($lista->data != false): ?>
              <ul id="l_playlist" class="nav nav-pills nav-stacked nav-playlist">
                <?php foreach($lista->data as $row): ?>
                  <li>
                    <a class="atem" href="#" data-id="<?=$row['play_id']?>">
                      <span class="glyphicon glyphicon-music icons-playlist"></span><?=$row['play_name']?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php else: ?>
              <p class="no-data">
                <b style="font-size: 70px;margin-top: 50px;"><span class="glyphicon glyphicon-headphones"></span></b>
                <br/>
                No se encontraron playlist disponibles.
              </p>
            <?php endif; ?>
            <div class="button-playlist">
              <a href="#" class="btn btn-outline btn-outline-static col-lg-12">Crear una Playlist</a>
            </div>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
  <div class="dropdown">
    <ul id="dropdown-playlist" class="dropdown-menu dropdown-theme" role="menu">
      <?php if(empty($lista)): ?>
        <?php foreach($lista->data as $row): ?>
          <li class="header-li"><b>Agregar a</b></li>
          <li class="divider"></li>
          <li>
            <a data-id-playlist="<?=$row['play_id']?>" href="#"><?=$row['play_name']?></a>
          </li>
          <li class="divider"></li>
        <?php endforeach; ?>
      <?php else: ?>
        <li>
          <a href="#!" style="color: #5D5D64 !important;">No hay playlist disponibles</a>
        </li>
      <?php endif; ?>
      <li>
        <a id="edit-song" data-id-song="" href="#">Editar</a>
      </li>
      <li>
        <a id="remove-song" data-id-song="" href="#">Eliminar</a>
      </li>
    </ul>
  </div>
