<?php 
	session_start();
	if(empty($_SESSION["id_pet"])){
        echo "<script>location = '../login/utama.php' </script>";
    }
    elseif($_SESSION["jabatan"]=='Petugas Antrian'||'Petugas Inti'){
        $id_pet = $_SESSION["id_pet"];	
		if (isset($_POST['id'])) {
			$id=$_POST['id'];
			$_SESSION['id'] = $id;
			$ses = $_SESSION['id'];
		}
		$tanda =$_POST['tanda'];
		if(isset($_POST['poli'])){
			$poli = $_POST['poli'];
			//echo "<script>location = 'panggilantrian.php' </script>";
		}
		
		$conn = mysqli_connect("localhost", "root", "", "projekweb");
		if ($tanda == 0) {
			$ket = "Dipanggil";
			$query = "UPDATE antrian SET ket='$ket' WHERE no_antrian = '$id' ";
			$proses_update = mysqli_query($conn, $query);
			$poli = "UPDATE poli SET panggil='$id' WHERE nm_poli = '$poli' ";
			$proses_poli = mysqli_query($conn, $poli);
			echo "	<script>
						document.location.href = 'panggilantrian.php';
					</script>";
		}
		elseif ($tanda == 1) {
			echo "	<script>
				document.location.href = 'panggilantrian.php';
			</script>";
		}
		else {
			$ket = "Tidak Hadir";
			$query = "UPDATE antrian SET ket='$ket' WHERE no_antrian = '$id' ";
			$proses_update = mysqli_query($conn, $query);	
			echo "	<script>
				document.location.href = 'panggilantrian.php';
			</script>";
		}
	}else{
		echo "<script>location = '../login/utama.php' </script>";
	}
?>