<?php
        session_start();
        if(empty($_SESSION["id_pet"])){
            echo "<script>location = '../index.php' </script>";
        }
        elseif($_SESSION["jabatan"]=='Petugas Inti'){
            $id_pet = $_SESSION["id_pet"];

	$id=$_POST['id'];
	$nama = $_POST['nama'];
	$tempatlahir = $_POST['tempatlahir'];
	$tanggallahir = $_POST['tanggallahir'];
	$jeniskelamin = $_POST['jeniskelamin'];
	$alamat = $_POST['alamat'];
	$nohp = $_POST['nohp'];
	$jab = $_POST['jabatan'];

	$conn = mysqli_connect("localhost", "root", "", "projekweb");

	$query = "UPDATE data_pet SET nama='$nama',tpt_lahir='$tempatlahir',tgl_lahir='$tanggallahir',j_kel='$jeniskelamin',alamat='$alamat',no_hp='$nohp',jabatan='$jab' WHERE id_petugas = '$id' ";

	$proses_update = mysqli_query($conn, $query);

	if ($proses_update) {
		echo "	<script>
					alert('Data Berhasil Dihapus!');
					document.location.href = 'a_tampilpetugas.php';
				</script>";
	}else{
		echo mysqli_error($conn); 
		echo "	<script>
					alert('Data Gagal Dihapus!');
					document.location.href = 'a_tampilpetugas.php';
				</script>";
	}
	}else{
		echo "<script>location = '../index.php' </script>";
	}
	
?>