<!DOCTYPE html>
<html>
<head>
	<title>Riwayat Kunjungan</title>
	<link rel="stylesheet" type="text/css" href="../dashboard.css?v=1.0">
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

	<div>
        <div class="sidebar">
            <ul style="margin-top: 125%;">
                <li><a href="a_tampilpasien.php">DASHBOARD</a></li>
                <li><a href="daftarantrian.php">DAFTAR ANTRIAN</a></li>
                <li><a href="datapasien.php">DATA PASIEN</a></li>
                <li><a href="riwayatkunjungan.php">RIWAYAT KUNJUNGAN</a></li>
                <li><a href="gantipassword.php">GANTI PASSWORD</a></li>
                <li><a href="../logoutpasien.php">LOGOUT</a></li>
            </ul>
        </div>

        <div class="isi">
            <table>
                <tr>
                    <td width="10px"></td>
                    <td><img src="../gambar/LOGO.png" style="height:50px"></td>
                    <td width="10px"></td>
                    <td width="1000px"><h2>Puskesmas Muara Dua<br>
                    Kota Lhokseumawe</h2></td>
                    <td width="50px"><img src="../gambar/user.png" style="height: 40px"></td>
                    <td><h3 style="font-size: 20px;">
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "projekweb");
                            if ($conn) {
                                // echo "berhasil";
                            } else {
                                echo "error";
                            }
                            $aata = mysqli_query($conn, "SELECT * FROM data_pas where id_pas='$id_pas'");
                            $a = mysqli_fetch_array($aata);
                            echo $a['nama'];
                        ?>
                            
                        </h3>
                    </td>
                </tr>
            </table>
        </div>

        <div class="dashboard">
            <p style="text-align: center; font-size: 50px; margin-left: 17%;">RIWAYAT KUNJUNGAN</p>
        </div>

        <div style="margin-left: 19%; margin-right: 5%;">
        <?php
            
        	$conn = mysqli_connect("localhost", "root", "", "projekweb");
            if ($conn) {
                // echo "berhasil";
            } else {
                echo "error";
            }
            $status = 'Dipanggil';
            $data = mysqli_query($conn, "SELECT * FROM antrian where id_pasien like '$id_pas' and ket like '$status'");

        ?>
        <br> <br>
	        <table cellspacing="0" cellpadding="10" border="1%" bgcolor="#F0E68C">
	            <tr>
	                <th width="2%">No</th>
	                <th width="8%">ID Pasien</th>
	                <th width="10%">Poli</th>
	                <th width="10%">Keluhan</th>
	                <th width="10%">Tanggal</th>
	                <th width="8%">Jam</th>
        	    </tr>
	        <?php $i=1; ?>
	            <?php while ($a = mysqli_fetch_array($data)) { ?>
	                <tr>
	                   <td align="center"><?= $i ?></td>
	                    <td style="font-size: 15px; text-align: center;"><?= $a['id_pasien'] ?></td>
	                    <td style="font-size: 15px; text-align: center;"><?= $a['poli'] ?></td>
	                    <td style="font-size: 15px; text-align: center;"><?= $a['keluhan'] ?></td>
	                    <td style="font-size: 15px; text-align: center;"><?= $a['tanggal'] ?></td>
	                    <td style="font-size: 15px; text-align: center;"><?= $a['jam'] ?></td>
	                </tr>
	            <?php $i++; ?>
	            <?php } ?>
	        </table>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>