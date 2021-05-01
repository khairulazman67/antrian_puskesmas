<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../dashboard.css">
</head>
<body>
    <?php
        session_start();
        if(empty($_SESSION["id_pet"])){
            echo "<script>location = '../index.php' </script>";
        }
        elseif($_SESSION["jabatan"]=='Petugas Inti'){
            $id_pet = $_SESSION["id_pet"];
    ?>
    <div>
        <div class="sidebar">
            <ul style="margin-top: 108%;">
                <li><a href="dasinti.php">DASHBOARD</a></li>
                <li><a href="../petugas_daftar/dasdaftar.php">PETUGAS DAFTAR</a></li>
                <li><a href="../petugas_panggil/daspanggil.php">PETUGAS ANTRIAN</a></li>
                <li><a href="../data_petugas/a_tampilpetugas.php">DATA PETUGAS</a></li>
                <li><a href="../poli/poli.php">POLI</a></li>
                <li><a href="gantipassword.php">GANTI PASSWORD</a></li>
                <li><a href="../logoutpetugas.php">LOGOUT</a></li>
            </ul>
        </div>

        <div class="isi">
            <table>
                <tr>
                    <td width="10px"></td>
                    <td><img src="../gambar/LOGO.png" style="height:50px"></td>
                    <td width="10px"></td>
                    <td width="450px"><h2>Puskesmas Muara Dua<br>
                    Kota Lhokseumawe</h2></td>
                    <td width="50px"><img src="../gambar/cari.png" style="height: 40px"></td>
                    <form action="cari.php" method="POST">
                        <td width="200px"><input type="text" name="cari" placeholder="Cari Nama Petugas" size="30"></td>
                        <td width="100px"><input type="submit" value="Cari"></td>
                    </form>
                    <td width="160px"></td>
                    <td width="50px"><img src="../gambar/user.png" style="height: 40px"></td>
                    <td><h3 style="font-size: 20px;">
                        <?php
                            $conn = mysqli_connect("localhost", "root", "", "projekweb");
                            if ($conn) {
                                // echo "berhasil";
                            } else {
                                echo "error";
                            }
                            $aata = mysqli_query($conn, "SELECT * FROM data_pet where id_petugas='$id_pet'");
                            $a = mysqli_fetch_array($aata);
                            echo $a['nama'];
                        ?>
                            
                    </h3></td>
                </tr>
            </table>
            </div>

        <div class="dashboard">
            <p style="text-align: center; font-size: 50px; margin-left: 15%;">POLIKLINIK</p>
        </div>

        <div style="margin-left: 20%">
        <br>
        <h2 style="margin-left: 23%;">Selamat Datang Di Sistem Antrian Puskesmas</h2>
        <br>
            <table width="93%"><tr>
                <td>
                    <form method="POST" action="../poli/prosesupdate.php">
                    <input type="hidden" name="asal" value="inti">
                    <td><input type="submit" name="tanda" value="Buka Semua" class="tombolijo" style="width: 100%; height: 50px"></td>
                </form>    
                </td>
                <td>
                    <form method="POST" action="../poli/prosesupdate.php">
                    <input type="hidden" name="asal" value="inti">
                    <td> <input type="submit" name="tanda" value="Tutup Semua" class="tombolmerah" style="width: 100%; height: 50px"></td>            
                </form>    
                </td>
            </tr></table>
            <br>
                <?php 
                	$conn = mysqli_connect("localhost", "root", "", "projekweb");
                    if ($conn) {
                        // echo "berhasil";
                    } else {
                        echo "error";
                    }
                    $data = mysqli_query($conn, "SELECT * FROM poli");
                ?>  
            	<table cellspacing="0" cellpadding="10" border="1%" bgcolor="#F0E68C" width="93%" >
        	        <tr>
        	                <th width="3%">No</th>
        	                <th width="10%">ID Poli</th>
        	                <th width="10%">Nama Poli</th>
        	                <th width="8%">Keterangan</th>
                            <th colspan="2" width="1%">Aksi</th>
                    </tr>
        	             <?php $i=1; ?>
                    <?php while ($a = mysqli_fetch_array($data)) { ?>
                        <tr>
                           <td align="center"><?= $i ?></td>
                            <td style="font-size: 15px; text-align: center;"><?= $a['id_poli'] ?></td>
                            <td style="font-size: 15px; text-align: center;"><?= $a['nm_poli'] ?></td>
                            <td style="font-size: 15px; text-align: center;"><?= $a['ket'] ?></td>
                            <form method="POST" action="../poli/prosesupdate.php"> 
                                <input type="hidden" name="id" value="<?= $a['id_poli']?>">
                                <input type="hidden" name="asal" value="inti">
                                <input type="hidden" name="tanda" value="buka">   
                                <td><center><input type="submit" name="buka" value="Buka" class="tombolijo"></center></td>
                            </form>
                            <form method="POST" action="../poli/prosesupdate.php">
                                <input type="hidden" name="id" value="<?= $a['id_poli']?>">
                                <input type="hidden" name="tanda" value="tutup">
                                <input type="hidden" name="asal" value="inti">
                                <td><center><input type="submit" name="tutup" value="tutup" class="tombolmerah"></center></td>
                            </form>
                        </tr>
                    <?php $i++; ?>
                    <?php } ?>
                </table>
            </div>
        </div>
    <?php
        }else{
            echo "<script>location = '../index.php' </script>";
        }
    ?>
</body>
</html>