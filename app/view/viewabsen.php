<?php
include_once 'header.php';
 
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
              <strong class="card-title">Data mahasiswa yang sudah absen</strong> tanggal <?php echo date("Y-m-d ");?>
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
   			  <?php
  				  $res = $MySQLiconn->query("SELECT * FROM absen INNER JOIN mahasiswa on mahasiswa.magang_id = absen.magang_id WHERE DATE(absen.tanggal) = DATE(NOW()) AND ket='HADIR'");
  				  while($row=$res->fetch_array()) { ?>

            <tr>
                <!-- <td><?php //echo $row['magang_id']; ?></td> -->
                <td><?php echo $row['nama']; ?></td>
                <!-- <td><?php // echo $row['tanggal']; ?></td> -->
                <td><?php echo $row['intime']; ?></td>
                <td><?php echo $row['ket']; ?></td>
          <!-- <td>
              <a href="?delabsen=<?php //echo $row['no']; ?>" class="btn btn-danger btn-flat m-b-15" onclick="return confirm('Hapus Data?'); " > <i class="fa fa-times"></i>hapus</a>
          </td> -->
            </tr>

              <?php } ?>
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
                  <strong class="card-title">Data mahasiswa yang izin, sakit dam alfa</strong>
                              

              </div>
              <div class="card-body">
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                	  <!-- <th>Magang_ID</th>           -->
                    <th>Nama</th>      
                    <!-- <th>Tanggal</th> -->
                    <!-- <th>Jam Masuk</th> -->
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
           			 <?php
          				$res = $MySQLiconn->query("SELECT * FROM absen INNER JOIN mahasiswa on mahasiswa.magang_id = absen.magang_id WHERE DATE(absen.tanggal) = DATE(NOW()) AND ket != 'hadir'");
          				while($row=$res->fetch_array())	{ ?>
                  <tr>
                    <!-- <td><?php // echo $row['magang_id']; ?></td> -->
                    <td><?php echo $row['nama']; ?></td>
                    <!-- <td><?php // echo $row['tanggal']; ?></td> -->
                    <!-- <td><?php // echo $row['intime']; ?></td> -->
                    <td><?php echo $row['ket']; ?></td>

                    <!-- <td>
                      <a href="?delabsen=<?php //echo $row['no']; ?>" class="btn btn-danger btn-flat m-b-15" onclick="return confirm('Hapus Data?'); " > <i class="fa fa-times"></i>hapus</a>
                    </td> -->
                  </tr>
              <?php } ?>
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
                            <strong class="card-title">Data Pegawai yang tidak masuk</strong>
                          
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
            <?php // $row['nip']; ?>
              <!-- <td><?php // echo $row['magang_id']; ?></td> -->
              <td><?php echo $row['nama']; ?></td>
              <!-- <td><?php // echo $date ?></td> -->
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
              <!-- <td>
                <form method="post">
                  <input type="hidden" name="magang_id"  value="<?php //echo $row['magang_id'];?>" />
                  <input type="hidden" name="ket"  value="alfa" />
                  <button type="submit" class="btn btn-danger btn-flat m-b-15" name="saveabsenadmin"><i class="fa fa-sign-out"></i>Alfa</button>
               </form>
              </td> -->
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


<?php
	include_once 'footer.php';
?>