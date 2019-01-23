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
					</div>
				<div class="card-header">
				<form method="GET" action="jurnal.php">
			  	<select class="" name="bulan">
						<option value=""><?php $bulan = $_GET['bulan']; echo $bulan ?></option>
			 
						<option value="1">Januari</option>
						<option value="2">Febuari</option>
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
					
					<select class="" name="tahun">
						<option value=""><?php  $tahun = $_GET['tahun']; echo $tahun ?></option>
						
						<!-- Start counting year -->
						<?php for ($i=2018; $i<=date("Y") ; $i++) { ?> 
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
					</select>

					<input type="submit" class="btn btn-primary" name="cari_jurnal" value="Cari Jurnal">
 					<!-- <a href="../report/printjurnal.php?bulan=<?php echo  $_GET['bulan'];?>&tahun=<?php echo  $_GET['tahun'];?>" class="btn btn-success float-right">cetak </a> -->
				</form>
			   
				</div>
					<div class="card-body">
				  <table id="bootstrap-data-table" class="table table-striped table-bordered">
					<thead>
					  <tr>
							<!-- <th>Magang_ID</th> -->
							<th>Nama</th>
							<th>Hadir</th>
							<th>Izin</th>
							<th>Sakit</th>
							<th>Alfa</th>
					  </tr>
					</thead>
					<tbody>
			
<?php
	date_default_timezone_set("Asia/Jakarta");
	$waktu = date('H:i:s');
	// $date = date("Y-m-d");
	// $dates = date("l,d-F-Y");
	// $day = date("D");
	$bulan = $_GET['bulan'];
	$tahun = $_GET['tahun'];
	$awal_bulan = $tahun . '/' . $bulan . '/01';
	$akhir_bulan = $tahun . '/' . $bulan . '/31';

	$res = $MySQLiconn->query("SELECT magang_id, nama FROM mahasiswa");
	while($row=$res->fetch_array()): ?>
		<tr>
	<?php 
		// SELECT COUNT(no) FROM absen WHERE ket = 'hadir' AND (tanggal > '2019/01/01' AND tanggal < '2019/01/31') AND magang_id = 1;
		$hadir = $MySQLiconn->query("SELECT no FROM absen WHERE magang_id = $row[magang_id] AND  ket = 'hadir' AND (tanggal > '$awal_bulan' AND tanggal < '$akhir_bulan')");
		$countHadir = mysqli_num_rows($hadir);
		$izin = $MySQLiconn->query("SELECT no FROM absen WHERE magang_id = $row[magang_id] AND ket = 'izin'");
		$countIzin = mysqli_num_rows($izin);
		$sakit = $MySQLiconn->query("SELECT no FROM absen WHERE magang_id = $row[magang_id] AND ket = 'sakit'");
		$countSakit = mysqli_num_rows($sakit);
		$alfa = $MySQLiconn->query("SELECT no FROM absen WHERE magang_id = $row[magang_id] AND ket = 'alfa'");
		$countAlfa = mysqli_num_rows($alfa);
	?>

		<!-- <td><?php // echo $row['magang_id']; ?></td> -->
		<td><?php echo $row['nama']; ?></td>
		<td><?php echo $countHadir; ?></td>
		<td><?php echo $countIzin; ?></td>
		<td><?php echo $countSakit; ?></td>
		<td><?php echo $countAlfa; ?></td>
	</tr>
	<?php // echo var_dump($awal_bulan, $akhir_bulan) ?>
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