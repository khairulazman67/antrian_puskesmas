<?php  
    session_start();
    if(empty($_SESSION["id_pet"])){
        echo "<script>location = '../index.php' </script>";
    }
    elseif($_SESSION["jabatan"]=='Petugas Inti'){
        $id_pet = $_SESSION["id_pet"];

		date_default_timezone_set('asia/jakarta');
		$tanggal =  date('d/m/Y h:i:s A');
		$nama = $_POST['nama'];
		$tempatlahir = $_POST['tempatlahir'];
		$tanggallahir = $_POST['tanggallahir'];
		$jeniskelamin = $_POST['jeniskelamin'];
		$alamat = $_POST['alamat'];
		$nohp = $_POST['nohp'];
		$jab = $_POST['jabatan'];

		$conn=mysqli_connect("localhost","root","","projekweb") or die ("koneksi gagal");
		if($conn){
		//Create id pasien
			$query = "SELECT max(id_petugas) as maxKode FROM data_pet";
			$hasilId = mysqli_query($conn,$query);
			$data = mysqli_fetch_array($hasilId);
			$kodeBarang = $data['maxKode'];
			$noUrut = (int) substr($kodeBarang, 3, 2);
			$noUrut++;
			$char = "PET";
			$idPetugas = $char . sprintf("%02s", $noUrut);
		
		// prosesinput data pasien
			$hasilInputData	= mysqli_query($conn,"insert into data_pet(id_petugas,nama,tpt_lahir,tgl_lahir,j_kel,alamat,no_hp,tgl_input,jabatan,id_penginput) values ('$idPetugas','$nama','$tempatlahir','$tanggallahir','$jeniskelamin','$alamat','$nohp','$tanggal','$jab','$id_pet')");
			$hasilInputAkun	= mysqli_query($conn,"insert into akun_pet (id_petugas,password,jabatan) values ('$idPetugas','$idPetugas','$jab')");
			if($hasilInputData && $hasilInputAkun){
				echo "<script> alert('Data berhasil diinput');</script>";
				echo "<script>location = 'a_daftarpetugas.php' </script>";
			}else{
				echo "<script> alert('Input data gagal');</script>";
				echo "<script>location = 'a_daftarpetugas.php' </script>";
			}	
		}else{
			echo "<script> alert('Konesi gagal');</script>";
		}
	}else{
		echo "<script>location = '../index.php' </script>";
	}
?>	