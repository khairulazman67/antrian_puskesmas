<!DOCTYPE html>
<html>
<head>
    <title>PASIEN</title>
    <link rel="stylesheet" type="text/css" href="../dashboard.css?v=1.0">
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
                    <form action="../poli/cari.php" method="POST">
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
            <p style="text-align: center; font-size: 50px; margin-left: 17%;">DATA PASIEN</p>
        </div>

        <div style="margin-left: 16%; margin-right: 1%">
        <?php
            
            $conn = mysqli_connect("localhost", "root", "", "projekweb");
            if ($conn) {
                // echo "berhasil";
            } else {
                echo "error";
            }
            $data = mysqli_query($conn, "SELECT * FROM data_pas");
        ?>

        <br>
        <a href="a_daftarpasien.php" class="tombol">Tambah Data</a>
        <br> <br> <br>

        <table cellspacing="0" cellpadding="10" border="1%" bgcolor="#F0E68C">
            <tr>
                <th width="3%">No</th>
                <th width="5%">ID Pasien</th>
                <th width="10%">NIK</th>
                <th width="10%">Nama</th>
                <th width="10%">Tempat Lahir</th>
                <th width="10%">Tanggal Lahir</th>
                <th width="8%">Jenis Kelamin</th>
                <th width="10%">Alamat</th>
                <th width="8%">Jamkes</th>
                <th width="8%">NO Jamkes</th>
                <th width="8%">No Hp</th>
                <th colspan="2">Aksi</th>
            </tr>
        <?php $i=1; ?>
            <?php while ($a = mysqli_fetch_array($data)) { ?>
                <tr>
                   <td align="center"><?= $i ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['id_pas'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['NIK'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['nama'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['tmp_lahir'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['tgl_lahir'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['j_kel'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['alamat'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['jaskes'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['no_jaskes'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['no_hp'] ?></td>

                    <form method="POST" action="delete.php?id=<?= $a['id_pas']?>">
                        <td><center><input type="submit" name="Hapus" value="Hapus"></center></td>
                    </form>

                    <form method="POST" action="a_daftarpasien.php">
                        <input type="hidden" name="id" value="<?= $a['id_pas']?>">
                        <input type="hidden" name="nik" value="<?= $a['NIK']?>">
                        <input type="hidden" name="nama" value="<?= $a['nama']?>">
                        <input type="hidden" name="tmp_lahir" value="<?= $a['tmp_lahir']?>">
                        <input type="hidden" name="tgl_lahir" value="<?= $a['tgl_lahir']?>">
                        <input type="hidden" name="j_kel" value="<?= $a['j_kel']?>">
                        <input type="hidden" name="alamat" value="<?= $a['alamat']?>">
                        <input type="hidden" name="jamkes" value="<?= $a['jaskes']?>">
                        <input type="hidden" name="no_jamkes" value="<?= $a['no_jaskes']?>">
                        <input type="hidden" name="hp" value="<?= $a['no_hp']?>">
                        <td><center><input type="submit" name="Edit" value="Edit"></center></td>
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
