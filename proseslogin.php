<?php
	session_start();
	if(isset($_POST["masuk"]) && $_POST["masuk"]){
		$idpas = $_POST["id_pas"];
		$password = $_POST["password"];
		$konek = mysqli_connect("localhost","root","");

		if ($idpas == "" || $password == "") {
			echo "<script> alert('ID atau password tidak boleh kosong');</script>";
			echo "<script>location = 'index.php' </script>";
		}
		mysqli_select_db($konek,"projekweb");
		$row = mysqli_query($konek,"SELECT * FROM akun_pas WHERE id_pas ='$idpas'");
		$hasil = mysqli_fetch_array($row);
		$aata = mysqli_query($konek, "SELECT * FROM data_pas where id_pas='$idpas'");
        $a = mysqli_fetch_array($aata);
		if ($hasil) {
			if ($password==$hasil['password']) {
				echo "<script> alert('Selamat Anda Berhasil Login');</script>";
				$_SESSION["id_pas"] = $idpas;
				$_SESSION["password"] = $password;
                $_SESSION['nama']=$a['nama'];
				echo "<script>location = 'pasien/a_tampilpasien.php' </script>";
			}else{
				echo "<script> alert('Password atau Email Salah');</script>";
				echo "<script>location = 'index.php' </script>";
			}
		}else{
			echo "<script> alert('ANDA BELUM TERDAFTAR. SILAHKAN MENDAFTAR DI PUSKESMAS!');</script>";
			echo "<script>location = 'index.php' </script>";
		}
	}
		
?>
