<!DOCTYPE html>
<html>
<head>
    <title>Panggil Antrian</title>
    <link rel="stylesheet" type="text/css" href="../dashboard.css?v=1.0">
    <style type="text/css">
        .kotak{
          background: #3CB371; 
          border-top: 0; 
          border-left: 0; 
          border-right: 0; 
          border-bottom: 5px solid #3CB371; 
          padding: 10px 10px; 
          text-decoration: none; 
          margin-right: 0px;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if(empty($_SESSION["id_pet"])){
            echo "<script>location = '../login/utama.php' </script>";
        }
        elseif($_SESSION["jabatan"]=='Petugas Antrian'||'Petugas Inti'){
            $id_pet = $_SESSION["id_pet"];
    ?>
    <div>
        <div class="sidebar">
            <ul style="margin-top: 125%;">
                <li><a href="daspanggil.php">DASHBOARD</a></li>
                <li><a href="panggilantrian.php">PANGGIL ANTRIAN</a></li>
                <li><a href="daftarantrian.php">DAFTAR ANTRIAN</a></li>
                <li><a href="datapasien.php">DATA PASIEN</a></li>
                <li><a href="riwayatkunjungan.php">RIWAYAT KUNJUNGAN</a></li>
                <li><a href="gantipassword.php">GANTI PASSWORD</a></li>
                <?php  
                    if ($_SESSION["jabatan"]=='Petugas Antrian') {   
                ?>
                    <li><a href="../logoutpetugas.php">LOGOUT</a></li>
                <?php 
                }elseif ($_SESSION["jabatan"]=='Petugas Inti') {
                ?>
                    <li><a href="../petugas_inti/dasinti.php">KEMBALI</a></li>
                <?php
                }   
                ?>

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
                <form action="caripasien.php" method="POST">
                    <td width="200px"><input type="text" name="cari" size="30"></td>
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
            <p style="text-align: center; font-size: 50px; margin-left: 14%;">ANTRIAN POLIKLINIK</p>
        </div>

        <br>
        <div style="margin-left: 18%">
        <?php
           
            $conn = mysqli_connect("localhost", "root", "", "projekweb");
            if ($conn) {
                // echo "berhasil";
            } else {
                echo "error";
            }
            date_default_timezone_set('asia/jakarta');
            $tanggal =  date('d/m/Y');

             if (isset($_POST['poli'])) {
                $namapoli = $_POST['poli'];
            }
            // if (isset($_COOKIE['poli'])) {
                 
            // }
            else{
                $poli1 = 1;
            }
            if (isset($namapoli)) {
                $data = mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and poli like '$namapoli' and ket like 'Antrian'");    
                $total= mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and poli like '$namapoli'");
                $jumlah = mysqli_num_rows($total);   
                $kriteria = "Antrian";
                $selesai = mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and ket != 'Antrian' and poli like '$namapoli'");
                $jumlah1 = mysqli_num_rows($selesai);
                 $sisa1 = mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and ket !='Dipanggil'and ket !='Tidak Hadir' and poli like '$namapoli'");
                $sisa = mysqli_num_rows($sisa1);
            
            ?>
            <table width="98%" style="text-align: center;"> 
                <tr>
                    <td><h3 class="kotak"> TOTAL ANTRIAN : <?php echo $jumlah. "<br>";?> </h3><br></td>
                    <td><h3 class="kotak"> ANTRIAN SELESAI : <?php echo $jumlah1 ."<br>";?></h3><br></td>
                    <td><h3 class="kotak"> ANTRIAN MENUNGGU : <?php echo $sisa ."<br>";?></h3><br></td>
                </tr>
            </table>
            <?php } ?>   
        <form action="panggilantrian.php" method="POST">
            <label for="poli"><h3>Poli</h3></label>
                <select name="poli" class="formlogin">
                    <?php  
                        $conn= mysqli_connect("localhost","root","","projekweb") or die (mysqli_error($conn));
                        $sql_poli = mysqli_query ($conn,"SELECT * FROM poli");
                        while ($datapoli=mysqli_fetch_array($sql_poli)){

                            echo '<option value="'.$datapoli['nm_poli'].'">'.$datapoli['nm_poli'].'</option>';
                        } 
                    ?>
                </select>
            </label><br><br>
            <input type="submit" value="Pilih" name="pilih" class="tombol"> &nbsp;
            <br><br>
        </form>

        <br><br>
        <p style="font-size: 25px; margin: 4px">
        <?php 
        if (isset($namapoli)){
            echo "Poli : ".$namapoli; 
        }
        ?></p>
        <?php if (isset($namapoli)) { ?>
        <table width="98%" cellspacing="0" cellpadding="10" border="1%" bgcolor="#F0E68C">
            <tr>
                <th width="3%">No</th>
                <th width="8%">No Antrian</th>
                <th width="8%">ID Pasien</th>
                <th width="10%">Nama Pasien</th>
                <th width="10%">Poli</th>
                <th width="10%">Keluhan</th>
                <th width="10%">Keterangan</th>
                <th width="10%">Tanggal</th>
                <th colspan="3" width="5%">Aksi</th>
            </tr>
        <?php $i=1; ?>
            <?php while ($a = mysqli_fetch_array($data)) { ?>
                <tr>
                    <td align="center"><?= $i ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['no_antrian'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['id_pasien'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['nm_pasien'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['poli'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['keluhan'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['ket'] ?></td>
                    <td style="font-size: 13px; text-align: center;"><?= $a['tanggal'] ?></td>

                    <form method="POST" action="panggil.php">
                        <input type="hidden" name="tanda" value = 0>
                        <input type="hidden" name="poli" value = "<?= $a['poli']?>">
                        <input type="hidden" name="id" value="<?= $a['no_antrian']?>">
                        <td><input type="submit" name="panggil" value="Panggil" class="tombolijo"></td>
                    </form>

                    <form method="POST" action="panggil.php">
                        <input type="hidden" name="tanda" value = 1>
                        <td><input type="submit" name="panggilulang" value="Panggil Ulang" class="tombolkuning" ></td>
                    </form>
                    
                    <form method="POST" action="panggil.php">
                        <input type="hidden" name="tanda" value=2>
                        <input type="hidden" name="id" value="<?= $a['no_antrian']?>">
                        <td><input type="submit" name="lompati" value="Lompati" class="tombolmerah"></td>
                    </form>                    	
                </tr>
            <?php $i++; ?>
            <?php }} ?>
        </table>
        </div>
    </div>
    <?php
        }else{
            echo "<script>location = '../login/utama.php' </script>";
        }
    ?>
</body>
</html>