<?php
	include_once 'header.php';
 	
 	$query_mhs = $MySQLiconn->query("SELECT magang_id, nama FROM mahasiswa");
?>

<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Log Mahasiswa Magang</h1>
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
						<strong class="card-title">Log Mahasiswa</strong>
					</div>
				<div class="card-header">
					<!-- 
								KIRIM REQUEST CARI LOG KE FILE INI } LOGIC HANDLE POST REQUEST DI BAWAH
					 -->
				<form method="post" action="">
			  	<select class="" name="mhs">
						<option value="">-</option>
						<?php while($mhs = $query_mhs->fetch_array()): ?>
							<option value="<?=$mhs['magang_id'];?>"><?=$mhs['nama'];?></option>
						<?php endwhile; ?>
					</select>

					<input type="submit" class="btn btn-primary" name="cari_log" value="Cari Log">
				</form>
			   
				</div>
					<div class="card-body">
				  <table id="bootstrap-data-table" class="table table-striped table-bordered">
					<thead>
					  <tr>
							<th>Nama</th>
							<th>Tanggal Log</th>
							<th>Log</th>
					  </tr>
					</thead>
					<tbody>

					<?php if (isset($_POST['mhs'])): ?>
						<?php 
							$mhs_dicari = $_POST['mhs'];
							$query_log = $MySQLiconn->query("SELECT mahasiswa.nama, log.log, log.tanggal_log FROM log INNER JOIN mahasiswa ON mahasiswa.magang_id = log.logger_id WHERE logger_id='$mhs_dicari' ORDER BY tanggal_log DESC");
						 ?>
						 <?php while($log = $query_log->fetch_array()): ?>
							<tr>
								<td><?php echo $log['nama']; ?></td>
								<td><?php echo $log['tanggal_log']; ?></td>
								<td><?php echo $log['log']; ?></td>
							</tr>	
						<?php endwhile; ?>
					<?php endif; ?>

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