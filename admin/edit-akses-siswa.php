<?php
  include "../models/koneksi.php";
  include "models/cek-akses.php";
  $id    = mysqli_real_escape_string($koneksi, $_GET['id']);
  if(!ctype_alnum($id)){
      header('location:anti.html');
  }
  if(isset($id)){
      $sql = "select username,email,password from user where id_siswa='$id'";
      $query      = mysqli_query($koneksi,$sql);
      $data       = mysqli_fetch_array($query);
  } else {
      header ("location:all-siswa.php");
  }


?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Akses Siswa | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="images/favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->
    <?php include "components/left-panel.php"; ?>
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include "components/header.php"; ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard Admin</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Siswa</a></li>
                            <li class="active">Edit Akses Siswa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit Akses Siswa</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="models/Update-akses-siswa.php" method="post" enctype="multipart/form-data"
                                    class="form-horizontal">
                                    <input type="hidden" name="id_siswa" id="id_siswa" value="<?php  echo $id ?>">
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="username"
                                                class=" form-control-label">Username</label></div>
                                        <div class="col-12 col-md-5"><input type="text" id="username" name="username"
                                                placeholder="Username.." class="form-control" maxlength="25" value="<?php echo $data['username'];?>" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="email"
                                                class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-5"><input type="email" id="email" name="email"
                                                placeholder="Email.." class="form-control" maxlength="40" value="<?php echo $data['email']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2"><label for="password"
                                                class=" form-control-label">Password</label></div>
                                        <div class="col-12 col-md-5"><input type="password" id="password"
                                                name="password" placeholder="Password.." minlength="6" maxlength="20"
                                                class="form-control" value="<?php echo $data['password']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col col-md-2">

                                    </div>
                                    <div class="col col-md-9">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Simpan
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <a href="all-siswa.php"
                                                class="text-light"><i class="fa fa-ban text-light"></i> Batal </a>
                                        </button>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->


        </div><!-- /#right-panel -->

        <!-- Right Panel -->

        <script src="assets/js/script.js"></script>
        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/js/main.js"></script>


        <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="vendors/jszip/dist/jszip.min.js"></script>
        <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>