<?php
    include '../lib/db.php';
    include '../lib/crud.php';
    include '../action/cek_login.php';

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Absensi Magang Immobi</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="../../favicon.ico">

    <link rel="stylesheet" href="../../assets/css/normalize.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../assets/css/lib/datatable/dataTables.bootstrap.min.css">

    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../../assets/scss/style.css">
    <link href="../../assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="halamanadmin.php"><img src="../../images/soactive.png" alt="Logo"></a>
                <!-- <a class="navbar-brand hidden" href="halamanadmin.php"><img src="../../images/logo2.png" alt="Logo"></a> -->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="halamanadmin.php"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <!-- /.menu-title -->
                    <!-- <h3 class="menu-title">Master Data</h3>
                    <li class="menu-item">
                        <a href="mhs.php"> <i class="menu-icon fa fa-users"></i>Mahasiswa </a>
                    </li> -->
                    <!-- <li class="menu-item">
                        <a href="golongan.php"> <i class="menu-icon fa fa-adjust"></i>Jabatan </a>
                    </li> -->
                  <!-- <li class="menu-item">
                        <a href="pengaturan.php"> <i class="menu-icon fa fa-adjust"></i>Pengaturan </a>
                    </li> -->
               
                    <h3 class="menu-title">Laporan</h3><!-- /.menu-title -->

                    <li class="menu-item">
                        <a href="reportmhs.php"> <i class="menu-icon fa fa-users"></i>Data</a>
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
                                <a class="nav-link" href="absensiharian.php"><i class="fa fa- user"></i>Logout</a>

                                 
                        </div>
                    </div> -->

                     

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->