<?php 
 include_once '../lib/crud.php';
 include_once '../action/cek_login.php';

 // echo var_dump($_SESSION);
  
  // echo var_dump(date('Y-m-d')); 
  
  $SQL = "SELECT absen.intime FROM absen WHERE magang_id = '$_SESSION[magang_id]' AND tanggal = DATE(NOW())";
  $data = mysqli_query($MySQLiconn, $SQL) or mysqli_error($MySQLiconn);
  $intime_data = $data->fetch_array();

  // echo var_dump($intime_data['intime']);
 ?>

<!DOCTYPE html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Absensi Magang Immobi</title>
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

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>
<body class="bg-dark">
  <div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
      <div class="login-content">
        <div class="login-logo">
          <a href="">
              <h2>Absen Magang</h2>
          </a>
        </div>
        <div class="login-form">
          <div class="mx-auto d-block">
            <img class="rounded-circle mx-auto d-block" src="../../images/avatar/user.png" alt="Card image cap">
            <h5 class="text-sm-center mt-2 mb-1"><?php echo $_SESSION['nama']; ?></h5>
            <div class="location text-sm-center"><i class="fa fa-map-marker"></i> <?php echo $_SESSION['alamat']; ?></div>
          </div>
          <form method="post">
            <div class="card-body">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th colspan="2" scope="col">Absen Tanggal 
                    <?php 
                        date_default_timezone_set("Asia/Jakarta");
                        if (isset($intime_data['intime'])) {
                          $waktu = $intime_data['intime'];
                        } else {
                          $waktu = date('H:i:s');
                        }
                        $date = date("Y-m-d");
                        $dates = date("l,d-F-Y");
                        $day = date("D");
                        $bulan = date("F");
                        $tahun = date("Y");
                        $magang_id = $_SESSION['magang_id'];
                        echo date("d-m-Y"); 
                    ?> 
                    </th>                                
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Nama</th>
                    <td><?php echo $_SESSION['nama'] ?></td>
                    <input type="hidden" name="no"  value="<?php if(isset($_GET['editabsen'])) echo $getROW['no'];  ?>" /> 
                    <input type="hidden" name="tanggal"  value="<?php if(isset($_GET['editabsen'])) echo $getROW['tanggal'];  ?>" /> 
                    <input type="hidden" name="magang_id"  value="<?php echo $_SESSION['magang_id'] ?>" />
                    <input type="hidden" name="username"  value="<?php echo $_SESSION['username']; ?>" />
                  </tr>
                  <tr>
                    <th scope="row">Username</th>
                    <td><?php echo $_SESSION['username']; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Waktu</th>
                    <td><?php echo $intime_data['intime'] ?> </td>
                  </tr>
	                <tr>
                    <th scope="row">Status</th>
                    <td>Hadir</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <?php // echo var_dump($_SESSION) ?>
            <?php if ($_SESSION['admin']): ?>
              <a href="halamanadmin.php"class="btn btn-primary btn-flat m-b-15">halaman admin</a>
              <a href="../action/logout.php" class="btn btn-outline-danger btn-flat m-b-15">keluar</a> 
            <?php else: ?>
              <?php  
                $cek= $MySQLiconn->query("SELECT * FROM absen WHERE magang_id='".$magang_id."' and tanggal='".$date."' and intime!=0");
                $result =  $cek->num_rows;
              ?>
              <?php if ($result!=0): ?>
                <?php $res = $MySQLiconn->query("SELECT * from absen where DATE(tanggal) = DATE(NOW()) and magang_id=$magang_id"); ?>
                <?php while($row=$res->fetch_array()): ?>
                  <!-- <a href="editmhs.php?edit=<?php //echo $row['magang_id']; ?>" class="btn btn-outline-primary btn-flat m-b-15">Ubah Data Diri </a>  -->
                  <?php //if (isset($_GET['editabsen'])): ?>
                    <!-- <button type="submit" class="btn btn-danger btn-flat m-b-15" name="updateabsen"><i class="fa fa-sign-out"></i>confirm</button>  -->
                  <?php //elseif ($row['outtime']!=0): ?>
                    <a href="../action/logout.php" class="btn btn-warning btn-flat m-b-15">sudah absen </a> 
                  <?php //endif; ?>
                <?php endwhile; ?>
              <?php else: ?>
                <button type="submit" class="btn btn-primary btn-flat m-b-15" name="saveabsen"><i class="fa fa-sign-out"></i>masuk</button> 
              <?php endif; ?>
            <?php endif; ?>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="../../assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/plugins.js"></script>
  <script src="../../assets/js/main.js"></script>
</body>
</html>
