<?php 
	session_start();
	if(empty($_SESSION["id_pet"])){
        echo "<script>location = '../index.php' </script>";
    }
    elseif($_SESSION["jabatan"]=='Petugas Pendaftaran'||'Petugas Inti'){
        $id_pet = $_SESSION["id_pet"];

		$poli = $_POST['poli'];
		$conn=mysqli_connect("localhost","root","","projekweb") or die ("koneksi gagal");
	    $cekpoli = mysqli_query($conn, "SELECT * FROM poli where nm_poli like '$poli'");
	    $a = mysqli_fetch_array($cekpoli);
		   	if (isset($a['ket'])) {
				$ket = $a['ket'];
		   	}	
		if (isset($ket)) {
			if ($ket == "tutup"){
				echo "<script> alert('Poli tutup, Poli dibuka kembali pada pukul 08:00');</script>";
				echo "<script>location = 'a_tampilpasien.php' </script>";
			}
			else{ 
	
				if (isset($_SESSION["id_pas"])) {
			        $id_pas = $_SESSION["id_pas"];
			        $id_inp = $_SESSION["id_pas"];
			    }
			    if (isset($_SESSION["id_pet"])) {
			    	$id_inp = $_SESSION["id_pet"];
			    }
				if (isset($_SESSION["nama"])) {
					$nama = $_SESSION["nama"];
				}
				date_default_timezone_set('asia/jakarta');
				$tanggal =  date('d/m/Y');
				$jam = date('h:i:s A');

				if($conn){
					$namapoli = $_POST['poli'];
					$keluhan = $_POST['keluhan'];
					// echo "id_pas = ".$_POST['id_pas'];
					if (isset($_POST['id_pas'])){
						$id_pas1 = $_POST['id_pas'];
						$id = mysqli_query($conn,"SELECT * FROM data_pas");
						while($id1 = mysqli_fetch_array($id)){
							if ($id1['id_pas'] == $id_pas1){
								$id_pas = $_POST['id_pas'];
								$nama = $id1['nama'];
							}
						}
					}


					$keterangan = 'Antrian';
					//Create id pasien
					$query = "SELECT max(no_antrian) as maxKode FROM antrian where poli = '$namapoli'";
					$hasilId = mysqli_query($conn,$query);
					$data = mysqli_fetch_array($hasilId);
					$kodeBarang = $data['maxKode'];
					$noUrut = (int) substr($kodeBarang, 1, 3);
					$noUrut++;
					if ($namapoli == 'Poli Gigi') {
						$char = "A";
					}
					elseif ($namapoli == 'Poli Anak') {
						$char = "B";
					}
					elseif ($namapoli == 'Poli Umum') {
						$char = "C";
					}
					elseif ($namapoli == 'Poli VCT') {
						$char = "D";
					}
					elseif ($namapoli == 'Poli KB/KIA') {
						$char = "E";
					}
					elseif ($namapoli == 'Poli Fisioterapi') {
						$char = "F";
					}
					elseif ($namapoli == 'Poli Gizi') {
						$char = "G";
					}
					elseif ($namapoli == 'Poli Imunisasi') {
						$char = "H";
					}
					$noAntri = $char . sprintf("%03s", $noUrut);
					if (isset($id_pas)) {
						$cek = mysqli_query($conn,"SELECT * FROM antrian WHERE id_pasien ='$id_pas' and tanggal = '$tanggal' and ket ='Antrian'");
						$hasil = mysqli_fetch_array($cek);
									
						if ($hasil) {
							echo "<script> alert('Pasien sudah mendaftar antrian');</script>";
							echo "<script>location = 'dasdaftar.php' </script>";
						}else{
							// prosesinput data pasien
								$inputpoli	= mysqli_query($conn,"insert into antrian(no_antrian,id_pasien,poli,keluhan,ket,tanggal,jam,id_inp,nm_pasien) values ('$noAntri','$id_pas','$namapoli','$keluhan','$keterangan','$tanggal','$jam','$id_inp','$nama')");
								if($inputpoli){
									echo "<script> alert('Data berhasil diinput');</script>";
									echo "<script>location = 'dasdaftar.php' </script>";
								}else{
									echo "<script> alert('Input data gagal');</script>";
									echo "<script>location = 'dasdaftar.php' </script>";
								}
						}
					}else{
						echo "<script> alert('Id Pasien Tidak Tersedia');</script>";
						echo "<script>location = 'daftarantrian.php' </script>";			
					}
				}else{
					echo "<script> alert('Input data gagal');</script>";
				}
			}
		}
	}else{
		echo "<script>location = '../index.php' </script>";
	}
 ?>