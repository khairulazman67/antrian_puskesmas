<!DOCTYPE html>
<html>
<head>
    <title>PASIEN</title>
    <link rel="stylesheet" type="text/css" href="../dashboard.css?v=1.1">
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
    <div>
        <div class="sidebar">
            <ul>
                <li><a href="">DASHBOARD</a></li>
                <li><a href="">PANGGIL ANTRIAN</a></li>
                <li><a href="a_daftarpasien.php">DAFTAR PASIEN</a></li>
                <li><a href="daftarantrian.php">DAFTAR ANTRIAN</a></li>
                <li><a href="">PETUGAS</a></li>
                <li><a href="">DATA PASIEN</a></li>
                <li><a href="">DATA PETUGAS</a></li>
                <li><a href="jabatan.php">JABATAN</a></li>
                <li><a href="jakes.php">JAMINAN KESEHATAN</a></li>
                <li><a href="poli.php">POLI</a></li>
                <li><a href="">RIWAYAT KUNJUNGAN PASIEN</a></li>
                <li><a href="../logoutpetugas.php">LOGOUT</a></li>
            </ul>
        </div>

        <div class="isi">
           <table>
                <tr>
                    <td width="10px"></td>
                    <td><img src="../gambar/LOGO.png" style="height:50px"></td>
                    <td width="10px"></td>
                    <td width="750px"><h2>Puskesmas Muara Dua<br>
                    Kota Lhokseumawe</h2></td>
                    <td width="50px"><img src="../gambar/cari.png" style="height: 40px"></td>
                    <form action="cari.php" method="POST">
                        <td width="200px"><input type="text" name="cari" size="30"></td>
                        <td width="90px"><input type="submit" value="Cari"></td>
                    </form>
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
            <p style="text-align: center; font-size: 50px; margin-left: 10%;">POLIKLINIK</p>
        </div>

        <div style="margin-left: 18%">
        <?php 
            $_SESSION['asal']='poli';

            $conn = mysqli_connect("localhost", "root", "", "projekweb");
            if ($conn) {
                // echo "berhasil";
            } else {
                echo "error";
            }
            $data = mysqli_query($conn, "SELECT * FROM poli");
        ?>
        <br>
        <a href="a_daftarpasien.php" class="tombol">Tambah Data</a>
        <br> <br> <br> 

        <form method="POST" action="prosesupdate.php">
            <td><input type="submit" name="tanda" value="Buka Semua" class="tombol"></td>            
        </form>
        <br>
        <form method="POST" action="prosesupdate.php">
            <td><input type="submit" name="tanda" value="Tutup Semua" class="tombol"></td>            
        </form>
        <br>
        
        <table cellspacing="0" cellpadding="10" border="1%" bgcolor="#F0E68C" width="40%" >
            <tr>
                <th width="3%">No</th>
                <th width="6%">ID Poli</th>
                <th width="10%">Nama Poli</th>
                <th width="10%">Keterangan</th>
                <th colspan="2" width="5%">Aksi</th>
            </tr>
        <?php $i=1; ?>
            <?php while ($a = mysqli_fetch_array($data)) { ?>
                <tr>
                   <td align="center"><?= $i ?></td>
                    <td><?= $a['id_poli'] ?></td>
                    <td><?= $a['nm_poli'] ?></td>
                    <td><?= $a['ket'] ?></td>
                    <form method="POST" action="prosesupdate.php"> 
                        <input type="hidden" name="id" value="<?= $a['id_poli']?>">
                        <input type="hidden" name="tanda" value="buka">   
                        <td><input type="submit" name="buka" value="Buka"></td>
                    </form>

                    <form method="POST" action="prosesupdate.php">
                         <input type="hidden" name="id" value="<?= $a['id_poli']?>">
                        <input type="hidden" name="tanda" value="tutup">
                        <td><input type="submit" name="tutup" value="tutup"></td>
                    </form>
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
