  <?php

    function evalURI($uri) {
      if(strstr($_SERVER['REQUEST_URI'], $uri)){ echo 'active'; }
    }

  ?>

  <div class="navbar navbar-inverse navbar-twitch" role="navigation">
    <div class="container">
      <div class="">
        <ul class="nav navbar-nav">
          <li class="li-title-nav">
            <span>Música</span>
          </li>
          <li class="item <?php evalURI('dashboard'); ?>">
            <a href="<?=base_url('dashboard');?>">
              <span class="small-nav">
                <span class="icon-stack icon-sidebar"></span> Dashboard
              </span>
            </a>
          </li>
          <li class="item <?php evalURI('songs'); ?>">
            <a href="<?=base_url('songs');?>">
              <span class="small-nav">
                <span class="icon-vynil icon-sidebar"></span> Canciones
              </span>
            </a>
          </li>
          <li class="item <?php evalURI('singers'); ?>">
            <a href="<?=base_url('singers');?>">
              <span class="small-nav">
                <span class="icon-user icon-sidebar"></span> Artistas
              </span>
            </a>
          </li>
          <li class="item <?php evalURI('playlist'); ?>">
            <a href="<?=base_url('playlist');?>">
              <span class="small-nav">
                <span class="icon-music icon-sidebar"></span> Playlist
              </span>
            </a>
          </li>
          <br />
          <li class="li-title-nav padded">
            <span>Administración</span>
          </li>
          <li class="item <?php evalURI('users'); ?>">
            <a href="<?=base_url('users');?>">
              <span class="small-nav">
                <span class="icon-user icon-sidebar"></span> Usuarios
              </span>
            </a>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
