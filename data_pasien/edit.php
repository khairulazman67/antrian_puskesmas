<?php
//
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

// INSERT INTO `tb_pembelajaran`(`ID`, `nama`, `kelas`, `jenis_kelamin`, `jurusan`, `hobby`, `alamat`) VALUES

$conn = mysqli_connect("localhost", "root", "", "projekweb");

echo "id adalah $id " ;

$query = "UPDATE data_pas SET NIK='$NIK',nama='$nama',tmp_lahir='$tempatlahir',tgl_lahir='$tanggallahir',j_kel='$jeniskelamin',alamat='$alamat',jaskes='$jamkes',no_jaskes='$nokartu',no_hp='$nohp',id_petugas='' WHERE id_pas = '$id' ";

// $hasilInputData	= mysqli_query($conn,"insert into data_pas(id_pas,NIK,nama,tmp_lahir,tgl_lahir,j_kel,alamat,jaskes,no_jaskes,no_hp,id_petugas) values ('$idPasien','$NIK','$nama','$tempatlahir','$tanggallahir','$jeniskelamin','$alamat','$jamkes','$nokartu','$nohp','')");

$proses_update = mysqli_query($conn, $query);

if ($proses_update) {
	echo "
			<script>
				alert('Data Berhasil Dihapus!');
				document.location.href = 'a_tampilpasien.php';
			</script>
		";
}else{
	echo mysqli_error($conn); 
	echo "
			<script>
				alert('Hapus Gagal!');
				document.location.href = 'a_tampilpasien.php';
			</script>
		";
}
// if ($conn) {
//     echo mysqli_error($conn);

//     "
// 			<script>
// 				alert('Data berhsail ditambahkan!');
// 				document.location.href = 'tampil.php';
// 			</script>
// 		"
// 		;
// } else {
//    echo "
// 			<script>
// 				alert('Data berhsail ditambahkan!');
// 				document.location.href = 'index.php';
// 			</script>
// 		";
// }

?>
