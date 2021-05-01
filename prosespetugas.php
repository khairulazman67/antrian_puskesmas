<?php
	session_start();
	if(isset($_POST["masuk"]) && $_POST["masuk"]){
		$idpet = $_POST["id_pet"];
		$password = $_POST["password"];
		$konek = mysqli_connect("localhost","root","");

		if ($idpet == "" || $password == "") {
			echo "<script> alert('ID atau Password Tidak Boleh Kosong');</script>";
			echo "<script>location = 'index.php' </script>";
			exit();
		}
		mysqli_select_db($konek,"projekweb");
		$row = mysqli_query($konek,"SELECT * FROM akun_pet WHERE id_petugas ='$idpet'");
		$hasil = mysqli_fetch_array($row);
        echo $hasil['password'];
		if ($hasil) {
			if ($password==$hasil['password']) {
				echo "<script> alert('Selamat Anda Berhasil Login');</script>";
				$_SESSION["id_pet"] = $idpet;
				$_SESSION["password"] = $password;
				$_SESSION["jabatan"] = $hasil['jabatan'];
				if ($hasil['jabatan']=='Petugas Antrian') {
        			echo "<script>location = 'petugas_panggil/daspanggil.php' </script>";
        		}	
				elseif ($hasil['jabatan']=='Petugas Pendaftaran') {
        			echo "<script>location = 'petugas_daftar/dasdaftar.php' </script>";
        		}
        		elseif ($hasil['jabatan']=='Petugas Inti') {
        			echo "<script>location = 'petugas_inti/dasinti.php' </script>";
        		}
			}else{
				echo "<script> alert('Password atau Email Salah');</script>";
				echo "<script>location = 'index.php' </script>";
			}
		}else{
			echo "<script> alert('ANDA BELUM TERDAFTAR. BUAT AKUN TERLEBIH DAHULU!');</script>";
			echo "<script>location = 'index.php' </script>";
		}	
	}	
?>