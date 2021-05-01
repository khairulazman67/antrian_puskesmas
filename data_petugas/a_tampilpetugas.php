<!DOCTYPE html>
<html>
<head>
    <title>PETUGAS</title>
    <link rel="stylesheet" type="text/css" href="../dashboard.css?v=1.1">
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
                <li><a href="../petugas_inti/dasinti.php">DASHBOARD</a></li>
                <li><a href="../petugas_daftar/dasdaftar.php">PETUGAS DAFTAR</a></li>
                <li><a href="../petugas_panggil/daspanggil.php">PETUGAS ANTRIAN</a></li>
                <li><a href="a_tampilpetugas.php">DATA PETUGAS</a></li>
                <li><a href="../poli/poli.php">POLI</a></li>
                <li><a href="../petugas_inti/gantipassword.php">GANTI PASSWORD</a></li>
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
                        <form action="../petugas_inti/cari.php" method="POST">
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
            <p style="color: black; text-align: center; font-size: 50px; margin-left: 15%;">DATA PETUGAS</p>
        </div>

        <div style="margin-left: 16%; margin-right: 1%;">
        <?php
            $conn = mysqli_connect("localhost", "root", "", "projekweb");
            if ($conn) {
                // echo "berhasil";
            } else {
                echo "error";
            }
            $data = mysqli_query($conn, "SELECT * FROM data_pet where jabatan != 'Petugas Inti'");
        ?>

        <br> <br>
        <a href="a_daftarpetugas.php" class="tombol">Tambah Data</a>
        <br> <br> <br>

        <table cellspacing="0" cellpadding="10" border="1%" bgcolor="#F0E68C">
            <tr> 
                <th width="3%">No</th>
                <th width="5%">ID Petugas</th>
                <th width="10%">Nama</th>
                <th width="10%">Tempat Lahir</th>
                <th width="10%">Tanggal Lahir</th>
                <th width="8%">Jenis Kelamin</th>
                <th width="10%">Alamat</th>
                <th width="10%">No Hp</th>
                <th width="10%">Jabatan</th>
                <th width="8%">Tanggal Input</th>
                <th width="8%">Penginput</th>
                <th colspan="2">Aksi</th>
            </tr>
        <?php $i=1; ?>
            <?php while ($a = mysqli_fetch_array($data)) { ?>
                <tr>
                    <td align="center"><?= $i ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['id_petugas'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['nama'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['tpt_lahir'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['tgl_lahir'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['j_kel'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['alamat'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['no_hp'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['jabatan'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['tgl_input'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['id_penginput'] ?></td>
            
                    <form method="POST" action="delete.php?id=<?= $a['id_petugas']?>">
                        <td style="text-align: center;"><input type="submit" name="Hapus" value="Hapus" class="tombolmerah"></td>
                    </form>
        
                    <form method="POST" action="a_daftarpetugas.php">
                        <input type="hidden" name="id" value="<?= $a['id_petugas']?>">
                        <td style="text-align: center;"><input type="submit" name="Edit" value="Edit" class="tombolkuning"></td>
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