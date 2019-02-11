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

         <div class="col-lg-8">
            <div class="card">
              <div class="card-header"><strong>Form</strong><small> Mahasiswa</small></div>
              <div class="card-body card-block">
                <form method="post">
                  <div class="form-group"><label for="NAMA" class=" form-control-label">Nama</label><input name="nama" type="text" id="NAMA" placeholder="Nama" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['nama'];  ?>">
                  </div>
                  <div class="form-group"><label for="telp" class=" form-control-label">No. Telepon</label><input name="telp" type="number" id="telp" placeholder="Nomer Telepon" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['telp'];  ?>">
                  </div>

                  <div class="form-group"><label for="email" class=" form-control-label">Email</label><input name="email" type="email" id="email" placeholder="Email" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['email'];  ?>">
                  </div>
                  
                   <div class="form-group"><label for="country" class=" form-control-label">Jenis Kelamin</label>
				               <select name="jk" id="jk" class="form-control">
                          <option value="L">Laki Laki</option>
                          <option value="P">Perempuan</option>
                       </select>
                   </div>

      						<div class="form-group"><label for="tanggal_lahir" class=" form-control-label">Tanggal Lahir</label><input name="tl" type="date" id="tl" placeholder="tanggal lahir" class="form-control"></div>
                  <div class="form-group"><label for="alamat" class=" form-control-label">Alamat</label><textarea name="alamat" type="textarea" id="alamat" placeholder="Masukkan alamat.." class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['alamat'];  ?>"><?php if(isset($_GET['edit'])) echo $getROW['alamat'];  ?></textarea></div>
      						<div class="form-group">
                    <?php if(isset($_GET['edit'])): ?>
      						    <button class="button-secondary pure-button" name="update"><i class="fa fa-floppy-o"></i>update</button> 
                    <?php else: ?>
      						    <button class="button-secondary pure-button" name="save"><i class="fa fa-floppy-o"></i> save</button>	
                    <?php endif; ?>
                  </div>
                </form>

              </div>
            </div>
          </div>
<?php
	include_once 'footer.php';
?>