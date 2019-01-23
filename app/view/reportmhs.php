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
                    <strong class="card-title">Data Mahasiswa</strong>
                    <!-- <a href="../report/printpegawai.php"><button type="button" class="float-right btn btn-success btn-lg">cetak</button></a> -->
                </div>

                <div class="card-body">
          <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive">
            <thead>
              <tr>
                <th>Magang_ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Mulai Magang</th>
                <th>Email</th>
                <th>Telepon</th>
               </tr>
            </thead>
            <tbody>
              
<?php $res = $MySQLiconn->query("SELECT magang_id, nama, username, alamat, jk, tanggal_lahir, mulai_magang, email, telp FROM mahasiswa ORDER BY magang_id ASC"); ?>
<?php while($row=$res->fetch_array()): ?>
<tr>
    <td><?php echo $row['magang_id']; ?></td>
    <td><?php echo $row['nama']; ?></td>
    <td><?php echo $row['username']; ?></td>
    <td><?php echo $row['alamat']; ?></td>
    <td><?php echo $row['jk']; ?></td>
    <td><?php echo $row['tanggal_lahir']; ?></td>
    <td><?php echo $row['mulai_magang']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['telp']; ?></td>
</tr>
<?php endwhile; ?>
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