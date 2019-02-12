<?php 
  include_once '../lib/db.php';
  include_once '../action/cek_login.php';

  // echo var_dump($_SESSION);

  $query_log = $MySQLiconn->query("SELECT log, tanggal_log FROM log WHERE logger_id='$_SESSION[magang_id]'ORDER BY tanggal_log DESC");
  // $start_date = date()
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
              <h2>Log Harian</h2>
          </a>
        </div>

        <!-- 
              MODAL TRIGGER MULAI DI SINI
              TOMBOL TRIGGER MODAL ADA DI BAWAH
         -->
        <div class="modal fade" id="buatlog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Log untuk tanggal </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="../action/buatlog.php">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="log-input" class="col-form-label">Log:</label>
                      <input type="text" class="form-control" id="log-input" name="log">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="submitlog">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="login-form">
          <div class="mx-auto d-block mb-3">
            <h5 class="text-sm-center mt-2 mb-1"><?php echo $_SESSION['nama']; ?></h5>
          </div>
          <!-- 
                TOMBOL MODAL DI SINI
           -->
          <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#buatlog">Buat Log</button>
          <a href="../action/logout.php" class="btn btn-outline-danger btn-flat m-b-15 mt-3">keluar</a> 

          <!-- 
                START LISTING LOG QUERY HERE
           -->
           <table class="table">
            <thead>
              <th></th>
              <th></th>
            </thead>
            <tbody>
              <?php while($row = $query_log->fetch_array()): ?>
                <tr>
                    <td scope="row"><?php echo date_format(date_create($row['tanggal_log']), 'd-m-Y') ?></td>
                    <td><?php echo $row['log']; ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  <script src="../../assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/plugins.js"></script>
  <script src="../../assets/js/main.js"></script>
  <script src="../../assets/js/modal.js"></script>
</body>
</html>
