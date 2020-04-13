<?php
  include "../models/koneksi.php";
  include "models/cek-akses.php";
?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SPP | Admin</title>
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
                            <li class="active">SPP</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Semua SPP</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Nominal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "select * from spp";
                                        $query = mysqli_query($koneksi, $sql);
                                        while($data = mysqli_fetch_array($query)){
                                            echo "<tr>
                                            <td>$data[id_spp]</td>
                                            <td>$data[bulan]</td>
                                            <td>$data[tahun]</td>
                                            <td>$data[nominal]</td>
                                            <td>                                                        
                                            <div class='dropdown float-right'>
                                            <button class='btn bg-transparent dropdown-toggle theme-toggle text-dark'
                                            type='button' id='opsi-siswa' data-toggle='dropdown'>
                                            <i class='fa fa-cog'></i></button>
                                            <div class='dropdown-menu' aria-labelledby='opsi-siswa'>
                                                <div class='dropdown-menu-content'>
                                                    <a class='dropdown-item text-warning'
                                                    href='edit-spp.php?id=$data[id_spp]'>Edit</a>
                                                    <a class='dropdown-item text-danger' href='models/Delete-spp.php?id=$data[id_spp]'>Delete</a>
                                                </div>
                                                </div>
                                                </div>
                                            </td>
                                            ";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <strong>Tambah SPP</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="models/Add-spp.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="bulan"
                                                class=" form-control-label">Bulan</label></div>
                                        <div class="col-12 col-md-7">
                                            <select name="bulan" id="bulan" class="form-control" required>
                                                <option value="">Pilih Bulan..</option>
                                                <script>
                                                    var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                                                    bulan.forEach((bulan) => {
                                                        document.write('<option value="' + bulan + '">' + bulan + '</option>');
                                                    });
                                                </script>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tahun"
                                                class=" form-control-label">Tahun</label></div>
                                        <div class="col-12 col-md-7">
                                            <select name="tahun" id="tahun" class="form-control" required>
                                                <option value="">Pilih Tahun..</option>
                                                <script>
                                                    var tahun = ["2019", "2020", "2021", "2022", "2023"];
                                                    tahun.forEach((tahun) => {
                                                        document.write('<option value="' + tahun + '">' + tahun + '</option>');
                                                    });
                                                </script>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nominal"
                                                class=" form-control-label">Nominal</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nominal" name="nominal"
                                                placeholder="Nominal.." class="form-control" minlength="4"
                                                onkeypress="return Angka(event)" maxlength="10" required><small
                                                class="form-text text-muted">Tidak boleh menggunakan titik (.)</small>
                                        </div>
                                    </div>
                                    <div class="col col-md-3">

                                    </div>
                                    <div class="col col-md-9">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </form>

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