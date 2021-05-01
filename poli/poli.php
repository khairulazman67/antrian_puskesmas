<!DOCTYPE html>
<html>
<head>
	<title>Poli</title>
	<link rel="stylesheet" type="text/css" href="style.css?v=1.0">
</head>
<body>
	<?php
		session_start();
        if(empty($_SESSION["id_pet"])){
            echo "<script>location = 'utama.php' </script>";
        }
        else{
            $id_pet = $_SESSION["id_pet"];
    ?>
	<div class="kotaklogin">
		<p class="tulisan_login">Poli</p>
		<form action="prosesdaftarpoli.php" method="POST">
			<label>Nama Poli</label>
				<input type="text" name="namapoli" class="formlogin">
			<br>
			<input type="submit" value="Daftar" name="Daftar" class="tombollogin">
			<br><br>
		</form>
		<Form action="../petugas_inti/dasinti.php" method="POST">
			<input type="submit" value="Cancel" name="Batalkan" class="tombollogin">
			<br><br>
		</form>
	</div>
	<?php
		}
	?>
</body>
</html>