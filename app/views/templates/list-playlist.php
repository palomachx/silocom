
  <div id="playlist" class="navbar navbar-inverse navbar-twitch" role="navigation">
    <div class="container">
      <div class="">
        <br />
        <ul class="nav navbar-nav">
          <li class="li-title-nav">
            <!-- <?php var_dump($lista); ?> -->
            <p class="text-center"><span>Playlists de <?=$lista->username;?></span></p>
            <?php if($lista->data != false): ?>
            <?php else: ?>
              <p class="no-data">
                <b style="font-size: 70px;margin-top: 50px;"><span class="glyphicon glyphicon-headphones"></span></b>
                <br/>
                No se encontraron playlist disponibles.
              </p>
              <div class="button-playlist">
                <a href="#" class="btn btn-outline btn-outline-static col-lg-12">Crear una Playlist</a>
              </div>
            <?php endif; ?>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
