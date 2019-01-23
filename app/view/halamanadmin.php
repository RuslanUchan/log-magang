<!doctype html>
<?php 
    include '../action/cek_login.php';
    include '../lib/db.php';
    include '../lib/crud.php';
 ?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log Magang Immobi</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../../assets/css/normalize.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../assets/scss/style.css">
    <link href="../../assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            
            <!-- THe option that appears when the screen is shrinked -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?=$_SERVER['PHP_SELF'];?>"><img src="../../images/soactive.png" alt="Logo"></a>
                <!-- <a class="navbar-brand hidden" href="#"><img src="../../images/logo2.png" alt="Logo"></a> -->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?=$_SERVER['PHP_SELF'];?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <!-- /.menu-title -->
                    <!-- <h3 class="menu-title">Master Data</h3>
                    <li class="menu-item">
                        <a href="mhs.php"> <i class="menu-icon fa fa-users"></i>Mahasiswa </a>
                    </li> -->
                 
                    <h3 class="menu-title">Laporan</h3><!-- /.menu-title -->

                    <li class="menu-item">
                        <a href="reportmhs.php"> <i class="menu-icon fa fa-users"></i>Data </a>
                    </li>
              
                    <li class="menu-item">
                        <a href="viewabsen.php"> <i class="menu-icon fa fa-adjust"></i>Absen </a>
                    </li>

                    <li class="menu-item">
                        <a href="jurnal.php?bulan=-&tahun=-&cari_jurnal=Cari+Jurnal"> <i class="menu-icon fa fa-money"></i>Jurnal </a>
                    </li>
                         
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-12">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <a class="nav-link btn btn-secondary btn-sm mb-1 float-right" href="absensiharian.php"><i class=""></i>Logout</a>
                    <!-- <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../../images/avatar/user.png" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="absensiharian.php"><i class=""></i>Logout</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </header>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success</span> Welcome
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            
        <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Mahasiswa</div>
                                <div class="stat-digit"><?php 
                                    $jumlahMhs = $MySQLiconn->query("SELECT * from mahasiswa");
                                    $countmahasiswa = mysqli_num_rows($jumlahMhs);
                                    echo $countmahasiswa;
                             ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Telah Absen</div>
                                <div class="stat-digit">
                                  <?php 
                                    $jumlahMhsAbsen = $MySQLiconn->query("SELECT * FROM absen INNER JOIN mahasiswa on mahasiswa.magang_id = absen.magang_id WHERE DATE(tanggal) = DATE(NOW())");
                                    $countMhsAbsen = mysqli_num_rows($jumlahMhsAbsen);
                                    echo $countMhsAbsen;
                             ?>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="../../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="../../assets/js/plugins.js"></script>
    <script src="../../assets/js/main.js"></script>


    <script src="../../assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/widgets.js"></script>
    <script src="../../assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="../../assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="../../assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="../../assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
