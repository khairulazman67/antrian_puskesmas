<?php  
	session_start();
	if(empty($_SESSION["id_pet"])){
        echo "<script>location = '../index.php' </script>";
    }
    elseif($_SESSION["jabatan"]=='Petugas Pendaftaran'||'Petugas Inti'){
        $id_pet = $_SESSION["id_pet"];
		date_default_timezone_set('asia/jakarta');
		$tanggal =  date('d/m/Y h:i:s A');
		$NIK = $_POST['NIK'];
		$nama = $_POST['nama'];
		$tempatlahir = $_POST['tempatlahir'];
		$tanggallahir = $_POST['tanggallahir'];
		$jeniskelamin = $_POST['jeniskelamin'];
		$alamat = $_POST['alamat'];
		$jamkes = $_POST['jaminankesehatan'];
		$nokartu = $_POST['nokartu'];
		$nohp = $_POST['nohp'];
		
		$number = preg_match('@[0-9]@', $NIK);
		
		$conn = mysqli_connect("localhost","root","","projekweb") or die ("koneksi gagal");
		if($conn){
		//Create id pasien
			$query = "SELECT max(id_pas) as maxKode FROM data_pas";
			$hasilId = mysqli_query($conn,$query);
			$data = mysqli_fetch_array($hasilId);
			$kodeBarang = $data['maxKode'];
			$noUrut = (int) substr($kodeBarang, 3, 5);
			$noUrut++;
			$char = "PAS";
			$idPasien = $char . sprintf("%05s", $noUrut);
			$tanda='';
		//Cek NIK
			$qnik = mysqli_query($conn, "SELECT * FROM data_pas");
		    while ($d = mysqli_fetch_array($qnik)) {
		    	if ($d['NIK']===$NIK) {
		    		$tanda ='terdaftar';
		    		break;
		    	}
		    }
		    if ($tanda =='terdaftar') {
		    	echo "<script> alert('NIK Pasien telah terdaftar');</script>";
				echo "<script>location = 'datapasien.php' </script>";
		    }
		    else{
		    	if(strlen($NIK)==16 && $number){
					// prosesinput data pasien
					$hasilInputData	= mysqli_query($conn,"insert into data_pas(id_pas,NIK,nama,tmp_lahir,tgl_lahir,j_kel,alamat,jaskes,no_jaskes,no_hp,tanggal,id_petugas) values ('$idPasien','$NIK','$nama','$tempatlahir','$tanggallahir','$jeniskelamin','$alamat','$jamkes','$nokartu','$nohp','$tanggal','$id_pet')");
					$hasilInputAkun	= mysqli_query($conn,"insert into akun_pas (id_pas,password,noHp) values ('$idPasien','$idPasien','$nohp')");
					if($hasilInputData && $hasilInputAkun){
						echo "<script> alert('Data berhasil diinput');</script>";
						echo "<script>location = 'datapasien.php' </script>";
					}else{
						echo "<script> alert('Input data gagal');</script>";
						echo "<script>location = 'datapasien.php' </script>";
					}
				}else{
					echo "<script> alert('NIK terdiri dari number 16 digit');</script>";
					echo "<script>location = 'daftarpasien.php' </script>";
				}
			}	
		}else{
			echo "<script> alert('Konesi gagal');</script>";
		}

}else{
	echo "<script>location = '../index.php' </script>";
}
?>	