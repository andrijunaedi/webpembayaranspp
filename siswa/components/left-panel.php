<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
          aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="./"><img src="images/logo-pgri.png" class="mr-2" width="32px" alt="Logo" />SMK PGRI</a>
        <a class="navbar-brand hidden" href="./"><img src="images/logo-pgri.png" alt="Logo" /></a>
      </div>

      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="./">
              <i class="menu-icon fa fa-dashboard"></i>Dashboard
            </a>
          </li>

          <h3 class="menu-title">Pembayaran</h3>
          <!-- /.menu-title -->
          <li>
            <a href="log-pembayaran.php?id=<?php echo $_SESSION['id_siswa'] ?>">
              <i class="menu-icon fa fa-bar-chart"></i>Log Pembayaran
            </a>
          </li>

        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>
  </aside>