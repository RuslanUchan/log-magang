<?php

include_once 'db.php';
/* pegawai */

/* mazuk */
if(isset($_POST['save']))
{

     $nama = $MySQLiconn->real_escape_string($_POST['nama']);
     $username = $MySQLiconn->real_escape_string($_POST['username']);
     $alamat = $MySQLiconn->real_escape_string($_POST['alamat']);
     $jk = $MySQLiconn->real_escape_string($_POST['jk']);
     $tanggal_lahir = $MySQLiconn->real_escape_string($_POST['tanggal_lahir']);
     // $pic = $MySQLiconn->real_escape_string($_POST['pic']);
     $pic = 'user.png';
     $mulai_magang = $MySQLiconn->real_escape_string($_POST['mulai_magang']);
     $password = $MySQLiconn->real_escape_string($_POST['password']);
     $email = $MySQLiconn->real_escape_string($_POST['email']);
     $telp = $MySQLiconn->real_escape_string($_POST['telp']);
	
	   $cek = $MySQLiconn->query("SELECT * FROM pegawai WHERE username='".$username."'");
   	 $result =  $cek->num_rows;
     if ($result != 0) {
       # code...
        echo "<script   language='JavaScript'>
        alert('username sudah terdaftar')
        </script>";

     } else{
	   $SQL = $MySQLiconn->query("INSERT INTO mahasiswa(magang_id, nama, username, alamat, jk, tanggal_lahir, pic, mulai_magang, password, email, telp) VALUES('', $nama', '$username', '$alamat', '$jk', '$tanggal_lahir', '$pic', '$mulai_magang', '$password', '$email', '$telp')");
      header("Location: mhs.php");
	 }

}
/* masuk */


/* delete */
if(isset($_GET['del']))
{
	$SQL = $MySQLiconn->query("DELETE FROM mahasiswa WHERE username=".$_GET['del']);
	header("Location: mhs.php");
}


/* edit data */
if(isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM mahasiswa WHERE magang_id=".$_GET['edit']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
  $SQL = $MySQLiconn->query("UPDATE mahasiswa SET nama='".$_POST['nama']."', alamat='".$_POST['alamat']."', jk='".$_POST['jk']."', tanggal_lahir='".$_POST['tanggal_lahir']."', telp='".$_POST['telp']."' WHERE username=".$_GET['edit']);
  header("Location: mhs.php");
}
if(isset($_POST['updatemhs']))
{
	$SQL = $MySQLiconn->query("UPDATE mahasiswa SET nama='".$_POST['nama']."', alamat='".$_POST['alamat']."', jk='".$_POST['jk']."', tanggal_lahir='".$_POST['tanggal_lahir']."', telp='".$_POST['telp']."', password='".$_POST['password']."', email='".$_POST['email']."' WHERE username=".$_GET['edit']);
	header("Location: absensiharian.php");
}
 
// if(isset($_GET['gaji']))
// {
// 	$SQL = $MySQLiconn->query("SELECT * from pegawai inner join golongan on pegawai.golongan=golongan.gol  WHERE nip=".$_GET['gaji']);
// 	$getROW = $SQL->fetch_array();
	
// }

// if(isset($_GET['gajiprint']))
// {
// 	$SQL = $MySQLiconn->query("SELECT * from pegawai  inner join golongan on pegawai.golongan=golongan.gol   WHERE nip=".$_GET['gajiprint']);
// 	$getROW = $SQL->fetch_array();
	
// }
 


 



/* golongan */

// if(isset($_POST['savegol']))
// {

//      $gol = $MySQLiconn->real_escape_string($_POST['gol']);
//      $jabatan = $MySQLiconn->real_escape_string($_POST['nama_jabatan']);
//      $gapok = $MySQLiconn->real_escape_string($_POST['gapok']);
//      $level = $MySQLiconn->real_escape_string($_POST['level']);
//      $tunj_kel = $MySQLiconn->real_escape_string($_POST['tunj_kel']);
//       $tunj_trans = $MySQLiconn->real_escape_string($_POST['tunj_trans']);
//      $tunj_makan = $MySQLiconn->real_escape_string($_POST['tunj_makan']);
      
	
// 	 $SQL = $MySQLiconn->query("INSERT INTO golongan(gol,nama_jabatan,Gapok,tunj_kel,tunj_trans,tunj_makan,pelaku ) VALUES('$gol','$jabatan','$gapok','$tunj_kel','$tunj_trans','$tunj_makan','$level')");
// 	   header("Location: golongan.php");

// 	 if(!$SQL)
// 	 {
// 		 echo $MySQLiconn->error;
// 	 } 
// }
// if(isset($_GET['delgol']))
// {
// 	$SQL = $MySQLiconn->query("DELETE FROM golongan WHERE gol=".$_GET['delgol']);
// 	header("Location: golongan.php");
// }
// if(isset($_GET['editgol']))
// {
// 	$SQL = $MySQLiconn->query("SELECT * FROM golongan WHERE gol=".$_GET['editgol']);
// 	$getROW = $SQL->fetch_array();
// }

// if(isset($_POST['updategol']))
// {
// 	$SQL = $MySQLiconn->query("UPDATE golongan SET  nama_jabatan='".$_POST['nama_jabatan']."',gapok='".$_POST['gapok']."',tunj_kel='".$_POST['tunj_kel']."', tunj_trans='".$_POST['tunj_trans']."',tunj_makan='".$_POST['tunj_makan']."' WHERE gol=".$_GET['editgol']);
// 	header("Location: golongan.php");
// }

 

 
// if(isset($_GET['pengaturan']))
// {
//   $SQL = $MySQLiconn->query("SELECT * FROM pengaturan WHERE id=".$_GET['pengaturan']);
//   $getROW = $SQL->fetch_array();
// }

// if(isset($_POST['updateset']))
// {
//   $SQL = $MySQLiconn->query("UPDATE pengaturan SET  aksi='".$_POST['aksi']."',title='".$_POST['title']."',value='".$_POST['value']."'  WHERE id=".$_GET['pengaturan']);
//   header("Location: pengaturan.php");
// }

 

 
 
/* absen harian */

if(isset($_POST['saveabsen']))
{
	DATE_default_timezone_set("Asia/Jakarta");
	// $no = $MySQLiconn->real_escape_string($_POST['no']);
  $magang_id = $MySQLiconn->real_escape_string($_POST['magang_id']);
  $tanggal = $MySQLiconn->real_escape_string($date = date("Y-m-d"));
  $intime = $MySQLiconn->real_escape_string($waktu = date('H:i:s'));
  // $outtime = $MySQLiconn->real_escape_string($waktu = date('H:i:s'));
  // $outtime = '';
  // $jam = $MySQLiconn->query("SELECT value FROM pengaturan  WHERE id='1'")->fetch_object()->value;   
  $cek= $MySQLiconn->query("SELECT * FROM absen WHERE magang_id='".$magang_id."' AND tanggal='".$tanggal."'");
  $result = $cek->num_rows;
 

 // If the query has results ...
 	if ($result != 0)
  		{
      	echo "<script   language='JavaScript'>
      	alert('Anda telah terabsen')
      	document.location='absensiharian.php';
      	</script>";
      }else{

      	$SQL = $MySQLiconn->query("INSERT INTO absen(no, magang_id, tanggal, intime, ket) VALUES('', '$magang_id', '$tanggal', '$intime', 'hadir')");
        $intime = date('H:i:s');
        header("Location: absensiharian.php");
        // $jam =  "08:30:00";
        // if($intime > $jam){
       //    	if($SQL){
       //    	$intime = date('H:i:s');
          	 
       //    	echo "<script   language='JavaScript'>
       //    	alert('anda TELAT BOSSSSS! $intime');
       //    	document.location='absensiharian.php';
       //    	</script>";
       //    	}
      	// }
      // 	else{
      // 	$SQL = $MySQLiconn->query("INSERT INTO absen(no,nip,tanggal,hari,bulan,tahun,intime,ket) VALUES('$no','$nip','$tanggal','$hari','$bulan','$tahun','$intime','HADIR')");
      // 	if($SQL){
      // 	$intime = date('H:i:s');
      //  	echo "<script   language='JavaScript'>
      // 	alert('anda RAJIN BOSS $intime ');
      // 	document.location='absensiharian.php';
      // 	</script>";
      // 	}
      // }
  }
}

if(isset($_POST['saveabsenadmin']))
{

     $magang_id = $MySQLiconn->real_escape_string($_POST['magang_id']);
     $tanggal = $MySQLiconn->real_escape_string($date = date("Y-m-d"));
     $ket = $MySQLiconn->real_escape_string($_POST['ket']);
  
     $cek = $MySQLiconn->query("SELECT * FROM absen WHERE magang_id='".$magang_id."' and tanggal='".$tanggal."'");
   	 $result =  $cek->num_rows;
 
      if ($result != 0)
  		{
      	echo "<script   language='JavaScript'>
      	alert('Telah terabsen')
      	document.location='absensiharian.php';
      	</script>";
      } else  {
	
	     $SQL = $MySQLiconn->query("INSERT INTO absen(no, magang_id, tanggal, ket) VALUES('','$magang_id', '$tanggal', '$ket')");
	 
      }

  	 if(!$SQL)
  	 {
  		 echo $MySQLiconn->error;
  	 } 
}

//
//
//  Still a mystery too
//
//

// if(isset($_GET['delabsen']))
// {
// 	$SQL = $MySQLiconn->query("DELETE FROM absen WHERE no=".$_GET['delabsen']);
// 	header("Location: absensi.php");
// }

//
//
//  Still a mystery too
//
//

// if(isset($_GET['editabsen']))
// {
// 	$SQL = $MySQLiconn->query("SELECT * FROM absen WHERE no=".$_GET['editabsen']);
// 	$getROW = $SQL->fetch_array();
// }

//
//
//  Still a mystery too
//
//

// if(isset($_GET['editab']))
// {

// 	$SQL = $MySQLiconn->query("SELECT * from pegawai   WHERE nip=".$_GET['editab']);
// 	$getROW = $SQL->fetch_array();
// }

//
//
//  Still a mystery
//
//
// if(isset($_POST['updateabsen']))
// {
//   	DATE_default_timezone_set("Asia/Jakarta");
//     $nip = $MySQLiconn->real_escape_string($_POST['nip']);
//  	  $intime = $MySQLiconn->real_escape_string($waktu = date('H:i:s'));
//     // $outtime = $MySQLiconn->real_escape_string($waktu = date('H:i:s'));
//     $jam = $MySQLiconn->query("SELECT value from pengaturan  WHERE id='7'")->fetch_object()->value;   

//     if($outtime > $jam){ // outtime='".$waktu = date('H:i:s')."', 
// 	   $SQL = $MySQLiconn->query("UPDATE absen SET nip='".$_POST['nip']."',tanggal='".$_POST['tanggal']."' , lembur='".'yes'."'WHERE no=".$_GET['editabsen']);
// 	header("Location: ../action/logout.php");
// }else{ // outtime='".$waktu = date('H:i:s')."',

// $SQL = $MySQLiconn->query("UPDATE absen SET nip='".$_POST['nip']."',tanggal='".$_POST['tanggal']."' , lembur='".'no'."'WHERE no=".$_GET['editabsen']);
// 	header("Location: ../action/logout.php");

// }

	
// }
 
// if(isset($_POST['updateabsenadmin']))
// {
// 	DATE_default_timezone_set("Asia/Jakarta");
// 	$intime = $MySQLiconn->real_escape_string($waktu = date('H:i:s'));
//   // $outtime = $MySQLiconn->real_escape_string($waktu = date('H:i:s'));
       
//   // outtime='".$waktu = date('H:i:s')."'
// 	$SQL = $MySQLiconn->query("UPDATE absen SET magang_id='".$_POST['magang_id']."',tanggal='".$_POST['tanggal']."', WHERE no=".$_GET['editabsen']);
// 	header("Location: absensi.php");
// }

?>

