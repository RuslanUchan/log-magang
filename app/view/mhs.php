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
                            <a href="actionmahasiswa.php"><button type="button" class="float-right btn btn-success btn-lg">tambah data</button></a>

                        </div>

                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
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
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      
<?php
$res = $MySQLiconn->query("SELECT magang_id, nama, username, alamat, jk, tanggal_lahir, mulai_magang, email, telp FROM mahasiswa ORDER BY magang_id ASC");
    while($row=$res->fetch_array())
    {
?>
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


    <td >
 
        <a href="actionmhs.php?edit=<?php echo $row['magang_id']; ?>" onclick="return confirm('Edit Data?'); " ><button class="btn btn-primary"><i class="fa fa-cog"></i>
edit</button></a>
        <a href="?del=<?php echo $row['magang_id']; ?>" onclick="return confirm('Hapus Data?'); " ><button class="btn btn-danger"><i class="fa fa-times"></i>
delete</button></a></td>
    </tr>

    <?php
}
?>
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