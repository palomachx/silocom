
  <div id="playlist" class="navbar navbar-inverse navbar-twitch" role="navigation">
    <div class="container">
      <div class="">
        <br />
        <ul class="nav navbar-nav">
          <p class="text-center label-top"><span>Playlists de <?=$lista->username;?></span></p>
          <li class="li-title-nav">
            <!-- <?php var_dump($lista); ?> -->
            <?php if($lista->data != false): ?>
            <?php else: ?>
              <!-- <p class="no-data">
                <b style="font-size: 70px;margin-top: 50px;"><span class="glyphicon glyphicon-headphones"></span></b>
                <br/>
                No se encontraron playlist disponibles.
              </p> -->
              <div class="button-playlist">
                <a href="#" class="btn btn-outline btn-outline-static col-lg-12">Crear una Playlist</a>
              </div>
              <ul id="l_playlist" class="nav nav-pills nav-stacked nav-playlist">
                <li>
                  <a class="atem" href="#"><span class="glyphicon glyphicon-music icons-playlist"></span> Playlist Name</a>
                </li>
                <li>
                  <a class="atem" href="#"><span class="glyphicon glyphicon-music icons-playlist"></span> Playlist Name</a>
                </li>
                <li>
                  <a class="atem" href="#"><span class="glyphicon glyphicon-music icons-playlist"></span> Playlist Name</a>
                </li>
              </ul>
            <?php endif; ?>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
