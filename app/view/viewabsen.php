<?php
include_once 'header.php';

DATE_default_timezone_set("Asia/Jakarta");

// var_dump($_GET);
// echo $_GET['tanggal'] ."<br>";
// echo $_GET['bulan'] ."<br>";
// echo isset($_GET['lihat_absen']) ."<br>";
// echo isset($_GET);

// $hari = (int) $_GET['tanggal'];
// $bulan = (int) $_GET['bulan'];
// $tgl = $hari ."-". $bulan ."-2019";
// echo $tgl;
?>

<div class="breadcrumbs">
  <div class="col-sm-4">
      <div class="page-header float-left">
          <div class="page-title">
              <h1>Mahasiswa</h1>
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
              <?php if(isset($_GET['lihat_absen'])): ?>
                <?php 
                  $hari = (int) $_GET['tanggal'];
                  $bulan = (int) $_GET['bulan'];
                  $tgl = $hari ."-". $bulan ."-2019";
                  $cd = '<strong class="card-title">Data mahasiswa yang sudah absen</strong> tanggal '. $tgl .'<br>';
                  echo $cd;
                 ?>
              <?php else: ?>
                <strong class="card-title">Data mahasiswa yang sudah absen</strong> tanggal <?php echo date("d-m-Y");?><br>
              <?php endif; ?>

              <div class="card-header">
                <form method="GET" action="viewabsen.php">
                  <input type="number" placeholder="Tanggal (1 - 31)" name="tanggal">
                  <select class="" name="bulan">
                    <option value="">-</option>
              
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                  
                  <input type="submit" class="btn btn-primary btn-sm" name="lihat_absen" value="Lihat Absen">
                </form>
              </div>
          </div>
        <div class="card-body">
        <table id="bootstrap-data-table" class="table table-striped table-bordered">
          <thead>
            <tr>
          	<!-- <th>Magang_ID</th>           -->
          	<th>Nama</th>      
            <!-- <th>Tanggal</th> -->
            <th>Jam Masuk</th>
            <th>Absen</th>
            </tr>
          </thead>
          <tbody>
          <?php if (isset($_GET["lihat_absen"])):?>
            <?php
              $tanggal = "2019-$bulan-$hari";
              $res = $MySQLiconn->query("SELECT * FROM absen INNER JOIN mahasiswa on mahasiswa.magang_id = absen.magang_id WHERE DATE(absen.tanggal) = '$tanggal' AND ket='hadir'");
              $jam = '08:30:00';
              $formatted_jam = strtotime($jam);
              while($row=$res->fetch_array()) { ?>
              <tr>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php  echo $row['intime'];  ?></td>
                  <?php if ($row['intime'] > date('H:i:s', $formatted_jam)): ?>
                    <td style="font-weight: 900; color: crimson;"><?php echo 'terlambat'; ?></td>
                  <?php else: ?>
                    <td><?php echo $row['ket']; ?></td>
                  <?php endif; ?>
              </tr>
                <?php } ?>
          <?php else: ?>
   			  <?php
  				  $res = $MySQLiconn->query("SELECT * FROM absen INNER JOIN mahasiswa on mahasiswa.magang_id = absen.magang_id WHERE DATE(absen.tanggal) = DATE(NOW()) AND ket='hadir'");
            $jam = '08:30:00';
            $formatted_jam = strtotime($jam);
  				  while($row=$res->fetch_array()) { ?>
            <tr>
                <td><?php echo $row['nama']; ?></td>
                <td><?php  echo $row['intime'];  ?></td>
                <?php if ($row['intime'] > date('H:i:s', $formatted_jam)): ?>
                  <td style="font-weight: 900; color: crimson;"><?php echo 'terlambat'; ?></td>
                <?php else: ?>
                  <td><?php echo $row['ket']; ?></td>
                <?php endif; ?>
            </tr>
              <?php } ?>
          <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  </div><!-- .animated -->
</div><!-- .content --><div class="content mt-3">
  <div class="animated fadeIn">
      <div class="row">

      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <strong class="card-title">Data mahasiswa yang izin, sakit dan alfa</strong>
              </div>
              <div class="card-body">
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Nama</th>      
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php if (isset($_GET["lihat_absen"])):?>
                  <?php
                    $res = $MySQLiconn->query("SELECT * FROM absen INNER JOIN mahasiswa on mahasiswa.magang_id = absen.magang_id WHERE DATE(absen.tanggal) = '$tanggal' AND NOT ket = 'hadir'");
                    while($row=$res->fetch_array()) { ?>
                      <tr>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['ket']; ?></td>
                      </tr>
                    <?php } ?>
                <?php else: ?>
                  <?php
                    $res = $MySQLiconn->query("SELECT * FROM absen INNER JOIN mahasiswa on mahasiswa.magang_id = absen.magang_id WHERE DATE(absen.tanggal) = DATE(NOW()) AND NOT ket = 'hadir'");
                    while($row=$res->fetch_array()) { ?>
                      <tr>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['ket']; ?></td>
                      </tr>
                  <?php } ?>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
  
    <?php if(!(isset($_GET['lihat_absen']))): ?>
    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Mahasiswa yang tidak masuk</strong>
                          
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
	                  	<!-- <th>Magang_ID</th>           -->
	                  	<th>Nama</th>          
			                <!-- <th>Tanggal</th> -->
			                <th colspan="3">Opsi</th>
			            
                      </tr>
                    </thead>
                    <tbody>
 			 <?php
            date_default_timezone_set("Asia/Jakarta");
            $date = date("Y-m-d");
            $magang_id = $_SESSION['magang_id'];
                    
				    $res = $MySQLiconn->query("SELECT * FROM mahasiswa WHERE NOT EXISTS(SELECT magang_id FROM absen WHERE absen.magang_id = mahasiswa.magang_id AND DATE(tanggal) = DATE(NOW()))");
				    while($row=$res->fetch_array()) { ?>

            <tr>
              <td><?php echo $row['nama']; ?></td>
              <td>
                <form method="post">
                  <input type="hidden" name="magang_id" value="<?php echo $row['magang_id'];?>" />
                  <input type="hidden" name="ket"  value="izin" /> <!-- Pass ket = izin-->
                  <button type="submit" class="btn btn-warning btn-flat m-b-15" name="saveabsenadmin"><i class="fa fa-sign-out"></i>Izin</button> 
                </form>
              </td>
              <td>
                <form method="post">
                  <input type="hidden" name="magang_id"  value="<?php echo $row['magang_id'];?>" />
                  <input type="hidden" name="ket"  value="sakit" />
                  <button type="submit" class="btn btn-primary btn-flat m-b-15" name="saveabsenadmin"><i class="fa fa-sign-out"></i>Sakit</button>
                </form> 
              </td>
            </tr>
          <?php } ?>
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
      <?php endif; ?>


<?php
	include_once 'footer.php';
?>