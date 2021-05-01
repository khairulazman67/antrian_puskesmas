<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		session_start();
		if(empty($_SESSION["id_pet"])){
			echo "<script>location = 'index.php' </script>";
			//exit();
		}
		else{
			session_destroy();
			$id_pet = '';
			echo "<script> alert('Logout Berhasil!');</script>";
			echo "<script>location = 'index.php' </script>";
		}
	?>
		<a href="form_login">Login</a>
</body>
</html>