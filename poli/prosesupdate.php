<?php
	session_start();
	if (isset($_POST['asal'])) {
		$asal = $_POST['asal'];
	}
	$tanda = $_POST['tanda'];
	$conn = mysqli_connect("localhost", "root", "", "projekweb");
	if (isset($_POST['id'])) {
		$idpoli = $_POST['id'];	
		if ($tanda =='tutup') {
			$ket = "tutup";
		}elseif($tanda =='buka') {
			$ket ="buka";
		}
			$query = "UPDATE poli SET ket='$ket' WHERE id_poli = '$idpoli' ";
			$proses_update = mysqli_query($conn, $query);
	}else{
		if($tanda == 'Buka Semua'){
			$ket = "buka";
		}elseif($tanda == 'Tutup Semua'){
			$ket = "tutup";
		}
			$query = "UPDATE poli SET ket='$ket'";
			$proses_update = mysqli_query($conn, $query);
	}
	if ($proses_update) {
		if ($asal == 'daftar') {	
			echo "
				<script>
					alert('Data Berhasil Diupdate!');
					document.location.href = '../petugas_daftar/dasdaftar.php';
				</script>
			";	
		}
		elseif ($asal == 'panggil') {
			echo "
				<script>
					alert('Data Berhasil Diupdate!');
					document.location.href = '../petugas_panggil/daspanggil.php';
				</script>
			";	
		}
		elseif ($asal == 'inti') {
			echo "
				<script>
					alert('Data Berhasil Diupdate!');
					document.location.href = '../petugas_inti/dasinti.php';
				</script>
			";	
		}
		elseif ($asal == 'poli') {
			echo "
				<script>
					alert('Data Berhasil Diupdate!');
					document.location.href = '../poli/a_tampilpoli.php';
				</script>
			";	
		}
	}else{
		echo mysqli_error($conn); 
		if ($asal == 'daftar') {
			echo "
				<script>
					alert('Data Gagal Diupdate!');
					document.location.href = '../petugas_daftar/dasdaftar.php';
				</script>
			";	
		}
		elseif ($asal == 'panggil') {
			echo "
				<script>
					alert('Data Gagal Diupdate!');
					document.location.href = '../petugas_panggil/daspanggil.php';
				</script>
			";	
		}
		elseif ($asal == 'inti') {
			echo "
				<script>
					alert('Data Gagal Diupdate!');
					document.location.href = '../petugas_inti/dasinti.php';
				</script>
			";	
		}
		elseif ($asal == 'poli') {
			echo "
				<script>
					alert('Data Gagal Diupdate!');
					document.location.href = '../poli/a_tampilpoli.php';
				</script>
			";	
		}
	}
?>
