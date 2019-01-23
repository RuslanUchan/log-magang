<?php 
 include_once '../lib/crud.php';
 include_once '../action/cek_login.php';

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
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../../assets/css/normalize.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../../assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="absensiharian.php">
                        <!-- <img class="align-content" width="200" src="../../images/logo.png" alt=""> -->
                        <h2>Log Magang Immobi</h2>
                    </a>
                </div>
                 <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header"><strong>Form</strong><small> Mahasiswa Magang</small></div>
                      <div class="card-body card-block">
                      <form method="post">
                        <!-- <div class="form-group">
                          <label for="NIP" class=" form-control-label">Username</label>
                          <input type="text" id="NIP" placeholder="Username " class="form-control" name="username" value="<?php //if(isset($_GET['edit'])) echo $getROW['username'];  ?>">
                        </div> -->
                        <div class="form-group"><label for="NAMA" class=" form-control-label">Nama</label><input name="nama" type="text" id="NAMA" placeholder="Nama" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['nama'];  ?>">
                        </div>
                        <div class="form-group"><label for="telp" class=" form-control-label">No. Telepon</label><input name="telp" type="number" id="telp" placeholder="No. Telepon" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['telp'];  ?>">
                        </div>

                        <div class="form-group"><label for="email" class=" form-control-label">Email</label><input name="email" type="email" id="email" placeholder="Email" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['email'];  ?>">
                        </div>
                        
                        <div class="form-group"><label for="country" class=" form-control-label">Jenis Kelamin</label>
  						            <select name="jk" id="jk" class="form-control">
                            <?php if(isset($_GET['edit'])) { ?>
                              <option value="<?php echo $getROW['jk']?>"><?php echo $getROW['jk']?></option>
                            <?php } ?>
                              <option value="L">Laki Laki</option>
                              <option value="P">Perempuan</option>
                          </select>
                        </div>

            						<div class="form-group">
                          <label for="tl" class=" form-control-label">Tanggal Lahir</label>
                          <input name="tanggal_lahir" type="date" id="tl" placeholder="Tanggal Lahir" class="form-control" value=<?php if(isset($_GET['edit'])) echo $getROW['tanggal_lahir'];?>></div>
                        <div class="form-group">
                          <label for="alamat" class=" form-control-label">Alamat</label>
                          <textarea name="alamat" type="textarea" id="alamat" placeholder="Alamat" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['alamat'];  ?>"><?php if(isset($_GET['edit'])) echo $getROW['alamat'];?></textarea>
                        </div>
            						<div class="form-group">
                          <?php if(isset($_GET['edit'])): ?>
            						    <button class="button-secondary pure-button" name="updatepeg"><i class="fa fa-floppy-o"></i>update</button> 
            							<?php endif; ?>
            	          </div>
                      </form>
                    </div>
                  </div>
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
