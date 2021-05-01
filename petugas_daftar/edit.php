<?php
	session_start();
	if(empty($_SESSION["id_pet"])){
        echo "<script>location = '../index.php' </script>";
    }
    elseif($_SESSION["jabatan"]=='Petugas Pendaftaran'||'Petugas Inti'){
        $id_pet = $_SESSION["id_pet"];
        
		$NIK = $_POST['NIK'];
		$nama = $_POST['nama'];
		$tempatlahir = $_POST['tempatlahir'];
		$tanggallahir = $_POST['tanggallahir'];
		$jeniskelamin = $_POST['jeniskelamin'];
		$alamat = $_POST['alamat'];
		$jamkes = $_POST['jaminankesehatan'];
		$nokartu = $_POST['nokartu'];
		$nohp = $_POST['nohp'];
		$id =$_POST['id'];

		$conn = mysqli_connect("localhost", "root", "", "projekweb");

		$query = "UPDATE data_pas SET NIK='$NIK',nama='$nama',tmp_lahir='$tempatlahir',tgl_lahir='$tanggallahir',j_kel='$jeniskelamin',alamat='$alamat',jaskes='$jamkes',no_jaskes='$nokartu',no_hp='$nohp',id_petugas='$id_pet' WHERE id_pas = '$id' ";

		$proses_update = mysqli_query($conn, $query);

		if ($proses_update) {
			echo "
					<script>
						alert('Data Berhasil Dihapus!');
						document.location.href = 'datapasien.php';
					</script>
			";
		}else{
			echo mysqli_error($conn); 
			echo "
					<script>
						alert('Hapus Gagal!');
						document.location.href = 'datapasien.php';
					</script>
			";
		}
	}
else{
	echo "<script>location = '../index.php' </script>";
}
?>
