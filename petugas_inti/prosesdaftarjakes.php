<?php  
    session_start();
    if(empty($_SESSION["id_pet"])){
        echo "<script>location = '../index.php' </script>";
    }
    elseif($_SESSION["jabatan"]=='Petugas Inti'){
        $id_pet = $_SESSION["id_pet"];
    
		date_default_timezone_set('asia/jakarta');
		$tanggal =  date('d/m/Y h:i:s A');
		$conn=mysqli_connect("localhost","root","","projekweb") or die ("koneksi gagal");
		if($conn){
		$namajabatan = $_POST['namajakes'];
		//Create id pasien
			$query = "SELECT max(kd_jakes) as maxKode FROM kartu_jakes";
			$hasilId = mysqli_query($conn,$query);
			$data = mysqli_fetch_array($hasilId);
			$kodeBarang = $data['maxKode'];
			$noUrut = (int) substr($kodeBarang, 1, 2);
			$noUrut++;
			$char = "J";
			$kdjakes = $char . sprintf("%02s", $noUrut);
		
		// prosesinput data pasien
			$inputjabatan	= mysqli_query($conn,"insert into kartu_jakes(kd_jakes,nm_jakes,tanggal,id_petugas) values ('$kdjakes','$namajabatan','$tanggal','')");
			if($inputjabatan){
				echo "<script> alert('Data berhasil diinput');</script>";
				echo "<script>location = 'jabatan.php' </script>";
			}else{
				echo "<script> alert('Input data gagal');</script>";
				echo "<script>location = 'jabatan.php' </script>";
			}	
		}else{
			echo "<script> alert('Input data gagal');</script>";
		}
    }else{
        echo "<script>location = '../index.php' </script>";
    }
?>	