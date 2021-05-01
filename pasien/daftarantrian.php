<!DOCTYPE html>
<html>
<head>
	<title>Daftar Antrian</title>
	<link rel="stylesheet" type="text/css" href="style.css?v=1.0">
</head>
<body>
	<?php 
		session_start();
        if(empty($_SESSION["id_pas"])){
            echo "<script>location = '../index.php' </script>";
        }
        else{
            $id_pas = $_SESSION["id_pas"];
	?>
	<div class="kotaklogin" style="margin-top: 8%;">
	<p class="tulisan_login">Daftar Antrian</p>
		<form action="prosesdaftarantrian.php" method="POST">
			<label for="poli">Poli</label><br>
				<select name="poli" class="formlogin">
					<option value="<?= isset($_session['poli']) ? $_session['poli'] : '' ?>"><?= isset($_session['poli']) ? $_session['poli'] : '-Pilihan-'?></option>
					<?php  
						$conn= mysqli_connect("localhost","root","","projekweb") or die (mysqli_error($conn));
						$sql_poli = mysqli_query ($conn,"SELECT * FROM poli");
						while ($datapoli=mysqli_fetch_array($sql_poli)) {
						 	echo '<option value="'.$datapoli['nm_poli'].'">'.$datapoli['nm_poli'].'</option>';
						} 
					?>
				</select>			
				<label>Keluhan</label>
					<input type="text" name="keluhan" class="formlogin">
					<br>
				</label><br>
				<input type="submit" value="Daftar" name="Daftar" class="tombollogin">
				<br><br>
		</form>
		<form action="a_tampilpasien.php" method="POST">
			<input type="submit" value="Cancel" name="cancel" class="tombollogin">
		</form>
	</div>
	<?php
		}
	?>
</body>
</html>