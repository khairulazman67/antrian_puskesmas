<?php
	session_start();
    if(empty($_SESSION["id_pas"])){
        echo "<script>location = '../index.php' </script>";
    }
    else{
        $id_pas = $_SESSION["id_pas"];	
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$conn = mysqli_connect("localhost", "root", "", "projekweb");
			$query =  "DELETE  FROM data_pas WHERE id_pas='$id'";
			$proses_delete1 = mysqli_query($conn,$query);
			$query2 =  "DELETE  FROM akun_pas WHERE id_pas='$id'";
			
			$proses_delete2 = mysqli_query($conn,$query2);
		}
		if ($proses_delete1&&$proses_delete2){
			echo "
					<script>
						alert('Data Berhasil Dihapus!');
						document.location.href = 'a_tampilpasien.php';
					</script>
				";
			} else{
				echo
				"
					<script>
						alert('Datat Gagal Dihapus!');
						document.location.href = 'a_tampilpasien.php';
					</script>
				";
		}
	}
?>
