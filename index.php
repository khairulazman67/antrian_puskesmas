<html>
<title>BERANDA</title>
<link rel="stylesheet" type="text/css" href="home.css?v=1.0">
<head>
	<body class="main">
        <div class="panel">
                <a href="#login" id="login_pop">Masuk Sebagai Pasien</a>
                <a href="#login_petugas" id="join_pop">Masuk Sebagai Petugas</a>
        </div>
        <!-- popup login -->
        <a href="#x" class="overlay" id="login"></a>
        <div class="popup">
        	<form action="proseslogin.php" method="POST">
	            <h2>Selamat Datang!</h2>
	            <p>Masukkan ID dan Password Anda!</p> <br>
	            <div>
	                <label>ID Pasien</label>
	                <input type="text" name="id_pas">
	            </div>
	            <div>
	                <label>Password</label>
	                <input type="password" name="password">
	            </div>
	            <br>
	            <center><input type="submit" value="Masuk"></center>
	            <input type="hidden" name="masuk" value="masuk">
	            <a class="close" href="#close"></a>
	        </form>
        </div>
        <a href="#x" class="overlay" id="login_petugas"></a>
        <div class="popup">
        	<form action="prosespetugas.php" method="POST">
	            <h2>Selamat Datang!</h2>
	            <p>Masukkan ID dan Password Anda!</p> <br>
					<div>
					<label>ID Petugas</label>
						<input type="text" name="id_pet" class="formlogin">
					</div>
					<div>
					<label>Password </label>
						<input type="password" name ="password" class="formlogin">
					</div>
					<br>
					<center><input type="submit" value="LOGIN"></center>
					<input type="hidden" name="masuk" value="masuk">
	            <a class="close" href="#close"></a>
	        </form>
        </div>

        <div class="isi">
        	<div class="isi1">
        		<center><h2>PUSKESMAS MUARA SATU KOTA LHOKSEUMAWE</h2></center>
	        	<center><img src="gambar/foto.jpg" height="50%" width="auto"></center>
	        	<p>Pusat Kesehatan Masyarakat, disingkat Puskesmas, adalah organisasi fungsional yang menyelenggarakan upaya kesehatan yang bersifat menyeluruh, terpadu, merata, dapat diterima dan terjangkau oleh masyarakat, dengan peran serta aktif masyarakat dan menggunakan hasil pengembangan ilmu pengetahuan dan teknologi tepat guna, dengan biaya yang dapat dipikul oleh pemerintah dan masyarakat. Upaya kesehatan tersebut diselenggarakan dengan menitikberatkan kepada pelayanan untuk masyarakat luas guna mencapai derajad kesehatan yang optimal, tanpa mengabaikan mutu pelayanan kepada perorangan.</p>
        	</div>
        </div>
	</body>
</head>
</html>