<header class="navbar navbar-dark navbar-sticky-top bg-primary">
    <nav>
      <div class="clearfix">
        <button class="navbar-toggler float-xs-right hidden-sm-up collapsed" type="button" data-toggle="collapse" data-target="#bd-main-nav" aria-controls="bd-main-nav" aria-expanded="false" aria-label="Toggle navigation"></button>
        <a class="navbar-brand hidden-sm-up" href="<?= $base_url; ?>">KRS Online</a>
      </div>
      <div class="navbar-toggleable-xs collapse" id="bd-main-nav" aria-expanded="false">
        <div class="navbar-header hidden-xs-down">
          <a class="nav-link navbar-brand" href="<?= $base_url; ?>">KRS Online</a>
        </div>
        <ul class="nav navbar-nav float-md-right">
          <li class="nav-item">
            <a class="nav-item nav-link" href="<?= $base_url; ?>krs/form_user.php">Data User</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="<?= $base_url; ?>krs/form_jurusan.php">Data Jurusan</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="<?= $base_url; ?>krs/form_matakuliah.php">Data Mata Perkuliahan</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="<?= $base_url; ?>krs/form_krs.php">Data KRS</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="<?= $base_url; ?>logout.php">Keluar</a>
          </li>
        </ul>
      </div>
    </nav>
</header>
