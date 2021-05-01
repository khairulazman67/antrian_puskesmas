<!DOCTYPE html>
<html>
<head>
	<title>Ganti Passowrd</title>
	<link rel="stylesheet" type="text/css" href="../dashboard.css?v=1.1">
</head>
<body>
	<?php 
  		session_start();
      if(empty($_SESSION["id_pet"])){
            echo "<script>location = '../login/utama.php' </script>";
        }
        elseif($_SESSION["jabatan"]=='Petugas Antrian'||'Petugas Inti'){
            $id_pet = $_SESSION["id_pet"];
	?>

	<div class="sidebar">
    <ul style="margin-top: 125%;">
       <li><a href="daspanggil.php">DASHBOARD</a></li>
        <li><a href="panggilantrian.php">PANGGIL ANTRIAN</a></li>
        <li><a href="daftarantrian.php">DAFTAR ANTRIAN</a></li>
        <li><a href="datapasien.php">DATA PASIEN</a></li>
        <li><a href="riwayatkunjungan.php">RIWAYAT KUNJUNGAN</a></li>
        <li><a href="gantipassword.php">GANTI PASSWORD</a></li>
                
        <?php  
            if ($_SESSION["jabatan"]=='Petugas Antrian') {   
        ?>
            <li><a href="../logoutpetugas.php">LOGOUT</a></li>
        <?php 
        }elseif ($_SESSION["jabatan"]=='Petugas Inti') {
        ?>
            <li><a href="../petugas_inti/dasinti.php">KEMBALI</a></li>
        <?php
        }   
        ?>
    </ul>
  </div>

  <div class="isi">
    <table>
           <table>
                <tr>
                    <td width="10px"></td>
                    <td><img src="../gambar/LOGO.png" style="height:50px"></td>
                    <td width="10px"></td>
                    <td width="450px"><h2>Puskesmas Muara Dua<br>
                    Kota Lhokseumawe</h2></td>
                    <td width="50px"><img src="../gambar/cari.png" style="height: 40px"></td>
                    <form action="caripasien.php" method="POST">
                       <td width="200px"><input type="text" placeholder="Cari Nama Pasien" name="cari" size="30"></td>
                        <td width="100px"><input type="submit" value="Cari"></td>
                    </form>
                    <td width="160px"></td>
                    <td width="50px"><img src="../gambar/user.png" style="height: 40px"></td>
                    <td><h3 style="font-size: 20px;">
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "projekweb");
                            if ($conn) {
                                // echo "berhasil";
                            } else {
                                echo "error";
                            }
                            $aata = mysqli_query($conn, "SELECT * FROM data_pet where id_petugas='$id_pet'");
                            $a = mysqli_fetch_array($aata);
                            echo $a['nama'];
                        ?>
                    </h3></td>
                </tr>
            </table>
  </div>
  
  <div class="dashboard">
      <p style="color: black; text-align: center; font-size: 50px; margin-left: 15%;">GANTI PASSWORD</p>
  </div>

  <BR>
  <div style="margin-left: 20%">
  	<form method="POST" action="gantipassword.php">
      <table>
        <tr>
          <td>Password Saat Ini</td>
  		    <td><input type="text" name="passsekarang"></td>
        </tr>
        <tr>
          <td>Password Baru</td>
  			  <td><input type="text" name="passwordbaru"></td>
        </tr>
        <tr>
          <td>Masukkan Ulang Password Baru</td>
          <td><input type="text" name="verifikasi"></td>
        </tr>
        <tr>
  		    <td><br><input type="submit" name="proses" value="Simpan" class="tombol"></td>
        </tr>
      </table>
  	</form>
  </div>

  <div>
  <?php 
  		if (isset($_POST['passsekarang'])) {
  			$passsekarang = $_POST['passsekarang'];
  			$passwordbaru = $_POST['passwordbaru'];
  			$verifikasi1 = $_POST['verifikasi'];
    	$conn = mysqli_connect("localhost","root","","projekweb");
    	$cekpasssekarang = mysqli_query($conn, "SELECT * FROM akun_pet where id_petugas='$id_pet'");
      $a = mysqli_fetch_array($cekpasssekarang);
  			if ($passsekarang == $a['password']) {		
  				if ($passwordbaru == $verifikasi1) {
  					$_SESSION['verifikasi']=$verifikasi1;
  					$verifikasi = $_SESSION['verifikasi'];
  					$uppercase = preg_match('@[A-Z]@',$verifikasi);
  		$lowercase = preg_match('@[a-z]@', $verifikasi);
       		$number = preg_match('@[0-9]@', $verifikasi);
  			if(strlen($verifikasi)<6||!$uppercase||!$lowercase||!$number){
  				echo "<script> alert('Password tidak aman');</script>";
  			}else{
     					$query = "UPDATE akun_pet SET password = '$verifikasi' WHERE id_petugas = '$id_pet'";
  				$proses_update = mysqli_query($conn, $query);
     					if($proses_update){
     						echo "<script>alert('Password berhasil diganti!')</script>";
  					echo "<script>location = '../login/utama.php' </script>";
     					}
  						}
  				}else{
   				echo "
  			<script>
  				alert('Password anda tidak sesuai!');
  			</script>
  		";
  				}
  			}else{
  				echo "
  		<script>
  			alert('Password anda salah!');
  		</script>
  	";
  			}
  		}
  ?>
  </div>
  <?php
    }else{
      echo "<script>location = '../login/utama.php' </script>";
    }
  ?>
</body>
</html>