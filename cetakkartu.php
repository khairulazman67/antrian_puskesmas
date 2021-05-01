<!DOCTYPE html>
<html>
<head>
	<title>Cetak Kartu</title>
</head>
<body>
	<?php

	if (isset($_POST['id'])) {
	   	$id_pas = $_POST["id"];
   		$conn=mysqli_connect("localhost","root","","projekweb");
		$data=mysqli_query($conn,"SELECT * FROM data_pas where id_pas = '$id_pas'"); 
		$q1 = mysqli_fetch_array($data);
	?>
	<div id="kotak">
		<table border="1"><tr><td>
		<table style="font-family: sans-serif;">
			<tr style="text-align: center;">
				<td>
					<img src="gambar/lhokseumawe.png" style="height: 60px">
				</td>
				<td style="font-weight: bold;">
					PEMERINTAH KOTA LHOKSEUMAWE<br>
					DINAS KESEHATAN <br>
					PUSKESMAS MUARA SATU
					
				</td>
				<td>
					<img src="gambar/puskesmas.png" style="height: 70px">
				</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center;"><p>KARTU RAWAT JALAN</p></td>
			</tr>
		</table >
		<table style="font-family: sans-serif;">
			<tr>
				<td>NO. KARTU JKN</td>
				<td> : <?php echo $q1['no_jaskes'] ?></td>
			</tr>
			<tr>
				<td>ID PASIEN</td>
				<td> : <?php echo $q1['id_pas']?></td>
			</tr>
			<tr>
				<td>NAMA PASIEN</td>
				<td> : <?php echo $q1['nama']?></td>
			</tr>
			<tr>
				<td>TANGGAL LAHIR</td>
				<td> : <?php echo $q1['tgl_lahir']?></td>
			</tr>
			<tr>
				<td>ALAMAT</td>
				<td> : <?php echo $q1['alamat']?></td>
			</tr>
			<tr>
				<td colspan="2" style="font-size: 13px"><p>*password default untuk login adalah ID Pasien</p></td>
			</tr>
		</table>
		</td></tr></table>
		<script>
			window.print();
		</script>
	<?php } ?>
	</div>
</body>
</html>