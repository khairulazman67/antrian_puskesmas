<?php
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	    $conn = mysqli_connect("localhost", "root", "", "projekweb");
	    $data = mysqli_query($conn, "SELECT * FROM data_pet WHERE id_petugas = '$id' ");
	    $d = mysqli_fetch_array($data);
	   }
    session_start();
    if(empty($_SESSION["id_pet"])){
        echo "<script>location = '../index.php' </script>";
    }
    elseif($_SESSION["jabatan"]=='Petugas Inti'){
        $id_pet = $_SESSION["id_pet"];
?>
<html>
<title>Form Pasien</title>
<link rel="stylesheet" type="text/css" href="../style.css?v=1.0">
<head>
	<body>
		<div class="kotaklogin">
			<p class="tulisan_login">FORM PETUGAS</p>

		    	<form action="<?=isset($_POST['id']) ? 'edit.php' : "a_prosesdaftarpetugas.php"?>" method="POST">
		    	<input type="hidden" name="id" value="<?=$id?>">
					<label>Nama Lengkap</label>
					
						<input type="text" name="nama" class="formlogin" value="<?= isset($d['nama']) ? $d['nama'] : '' ?>">
					<label>Tempat Lahir</label>
						<input type="text" name="tempatlahir" class="formlogin" value="<?= isset($d['tpt_lahir']) ? $d['tpt_lahir'] : '' ?>">
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
					<label>No Hp</label>
						<input type="text" name="nohp" class="formlogin" value="<?= isset($d['no_hp']) ? $d['no_hp'] : '' ?>">	
					<label for="jabatan">Jabatan</label><br>
						<select name="jabatan" class="formlogin">
							<option value="" name	>-Pilih-</option>
							<?php  
								$conn= mysqli_connect("localhost","root","","projekweb") or die (mysqli_error($conn));
								$sql_poli = mysqli_query ($conn,"SELECT * FROM jabatan");
								while ($datapoli=mysqli_fetch_array($sql_poli)) {
								 	echo '<option value="'.$datapoli['nm_jabatan'].'">'.$datapoli['nm_jabatan'].'</option>';
								} 
							?>
						</select>
					</label><br>
					<input type="submit" value="Simpan" name="Daftar" class="tombollogin">
					<br>
				</form>
				<form action="a_tampilpetugas.php" method="POST">
					<input type="submit" value="Cancel" name="kembali" class="tombollogin" >
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