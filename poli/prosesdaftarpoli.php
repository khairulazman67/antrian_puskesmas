<?php  
	$conn=mysqli_connect("localhost","root","","projekweb") or die ("koneksi gagal");
	if($conn){
	$namapoli = $_POST['namapoli'];
	//Create id pasien
		$query = "SELECT max(id_poli) as maxKode FROM poli";
		$hasilId = mysqli_query($conn,$query);
		$data = mysqli_fetch_array($hasilId);
		$kodeBarang = $data['maxKode'];
		$noUrut = (int) substr($kodeBarang, 3, 2);
		$noUrut++;
		$char = "POL";
		$idpoli = $char . sprintf("%02s", $noUrut);
	
	// prosesinput data pasien
		$inputpoli	= mysqli_query($conn,"insert into poli(id_poli,nm_poli,id_petugas) values ('$idpoli','$namapoli','')");
		if($inputpoli){
			echo "<script> alert('Data berhasil diinput');</script>";
			echo "<script>location = 'poli.php' </script>";
		}else{
			echo "<script> alert('Input data gagal');</script>";
			echo "<script>location = 'poli.php' </script>";
		}	
	}else{
		echo "<script> alert('Input data gagal');</script>";
	}
?>	