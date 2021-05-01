<?php 
	session_start();
    if(empty($_SESSION["id_pas"])){
        echo "<script>location = '../index.php' </script>";
    }
    else{
        $id_pas = $_SESSION["id_pas"];
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
			    if (isset($_SESSION["id_pas"])) {
			    	$id_inp = $_SESSION["id_pas"];
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
					
					$cek = mysqli_query($conn,"SELECT * FROM antrian WHERE id_pasien ='$id_pas' and tanggal = '$tanggal' and ket ='Antrian'");
					$hasil = mysqli_fetch_array($cek);
					if ($hasil) {
						echo "<script> alert('Anda sudah mendaftar antrian');</script>";
						echo "<script>location = 'a_tampilpasien.php' </script>";
					}else{
						// prosesinput data pasien
							$inputpoli	= mysqli_query($conn,"insert into antrian(no_antrian,id_pasien,poli,keluhan,ket,tanggal,jam,id_inp,nm_pasien) values ('$noAntri','$id_pas','$namapoli','$keluhan','$keterangan','$tanggal','$jam','$id_inp','$nama')");
							if($inputpoli){
								echo "<script> alert('Data berhasil diinput');</script>";
								echo "<script>location = 'a_tampilpasien.php' </script>";
							}else{
								echo "<script> alert('Input data gagal');</script>";
								echo "<script>location = 'a_tampilpasien.php' </script>";
							}
					}
				}else{
					echo "<script> alert('Input data gagal');</script>";
				}
			}
		}
	}
 ?>