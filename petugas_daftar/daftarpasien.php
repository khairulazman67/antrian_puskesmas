<?php
	session_start();
	if(empty($_SESSION["id_pet"])){
		echo "<script>location = '../index.php' </script>";
	}
	elseif($_SESSION["jabatan"]=='Petugas Pendaftaran'||'Petugas Inti'){
	    $id_pet = $_SESSION["id_pet"];
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
		    $conn = mysqli_connect("localhost", "root", "", "projekweb");
		    $data = mysqli_query($conn, "SELECT * FROM data_pas WHERE id_pas = '$id' ");
		    $d = mysqli_fetch_array($data);
	   }
?>
<html>
<title>Form Pasien</title>

<link rel="stylesheet" type="text/css" href="../style.css?v=1.0" style="font-weight: 600;">
<head>
	<body>
		<div class="kotaklogin">
			<p class="tulisan_login">FORM PASIEN</p>

		    	<form action="<?=isset($_POST['id']) ? 'edit.php' : "prosesdaftarpasien.php"?>" method="POST">
		    	<input type="hidden" name="id" value="<?=$id?>">
					<label>NIK</label>
						<input type="text" name="NIK" class="formlogin" value="<?= isset($d['NIK']) ? $d['NIK'] : '' ?>">
					<label>Nama Lengkap</label>
						<input type="text" name="nama" class="formlogin" value="<?= isset($d['nama']) ? $d['nama'] : '' ?>">
					<label>Tempat Lahir</label>
						<input type="text" name="tempatlahir" class="formlogin" value="<?= isset($d['tmp_lahir']) ? $d['tmp_lahir'] : '' ?>">
					<label>Tanggal Lahir</label>
						<input type="date" name="tanggallahir" class="formlogin" value="<?= isset($d['tgl_lahir']) ? $d['tgl_lahir'] : '' ?>">
					<label>Jenis Kelamin</label>
						<select name="jeniskelamin" class="formlogin">
							<option value="<?= isset($d['j_kel']) ? $d['j_kel'] : '' ?>"><?= isset($d['j_kel']) ? $d['j_kel'] : '-Pilihan-' ?></option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					<label>Alamat</label>
						<input type="textarea" name="alamat" class="formlogin" value="<?= isset($d['alamat']) ? $d['alamat'] : '' ?>">	
					<label>Jaminan Kesehatan</label>
						<select name="jaminankesehatan" class="formlogin" id="">
							<option value="<?= isset($d['jaskes']) ? $d['jaskes'] : '' ?>"><?= isset($d['jaskes']) ? $d['jaskes'] : '-Pilihan-' ?></option>
							<option value="BPJS">BPJS</option>
							<option value="JKN">JKN</option>
							<option value="JAMKESMAS">JAMKESMAS</option>
						</select>
					<label style="border-color: ">No Kartu Jaminan Kesehatan</label>
						<input type="text" name="nokartu" class="formlogin" value="<?= isset($d['no_jaskes']) ? $d['no_jaskes'] : '' ?>">	
					<label>No Hp</label>
						<input type="text" name="nohp" class="formlogin" value="<?= isset($d['no_hp']) ? $d['no_hp'] : '' ?>">	
					<input type="submit" value="Simpan" name="Daftar" class="tombollogin">
					<br>
				</form>
				
				<form action="dasdaftar.php" method="POST">
					<input type="submit" value="Cancel" name="cancel" class="tombollogin">
				</form>
		</div>
		<?php 
			}else{
				echo "<script>location = '../index.php' </script>";
			}
		?>
	</body>
</head>
</html>