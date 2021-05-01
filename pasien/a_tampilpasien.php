<!DOCTYPE html>
<html>
<head>
    <title>Pasien</title>
    <link rel="stylesheet" type="text/css" href="../dashboard.css?v=1.1">
</head>
<body>
    <?php 
        session_start();
        if(empty($_SESSION["id_pas"])){
            echo "<script>location = '../index.php' </script>";
        }
        else{
            $id_pas = $_SESSION["id_pas"];
            date_default_timezone_set('asia/jakarta');
            $tanggal =  date('d/m/Y');
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
            <p style="text-align: center; font-size: 50px; margin-left: 15%;">Halaman Utama Pasien</p>
        </div>

        <div style="margin-left: 18%; margin-right: 2%;">
            <form action="" method="POST">
                <table style="margin-left: 25%;">
                    <br>
                    <tr>
                        <td class="tulisan"><center> 
                        <?php 
                            $conn= mysqli_connect("localhost","root","","projekweb") or die (mysqli_error($conn));
                            $antri = mysqli_query($conn, "SELECT * FROM antrian where id_pasien='$id_pas' and tanggal = '$tanggal' and ket='Antrian'");
                            $a = mysqli_fetch_array($antri);
                            $poli=$a['poli'];
                            if ($a){
                                echo $a['no_antrian'];
                            }else{
                                echo "-";
                            }
                        ?> 
                        </center></td>
                        <td class="tulisan"><center> 
                        <?php
                            $conn= mysqli_connect("localhost","root","","projekweb") or die (mysqli_error($conn));
                            $antri = mysqli_query($conn, "SELECT * FROM antrian where id_pasien='$id_pas' and tanggal = '$tanggal' and ket='Antrian'");
                            $a = mysqli_fetch_array($antri);
                            $poli=$a['poli'];
                            if ($a){
                                echo $a['poli'];
                            }else{
                                echo "-";
                            }
                        ?> 
                        </center></td>
                    </tr>

                    <tr>
                        <td><input type="button" name="panggil" value="Antrian Anda" class="btn third"></td>
                        <td><input type="button" name="panggil" value="Poli Anda" class="btn third"></td>
                    </tr>
                </table>
                <strong style="font-size: 20px">Tabel Antrian</strong>
                <table cellspacing="0" cellpadding="10" border="1%" bgcolor="#F0E68C">
                    <tr>
                        <th width="3%">No</th>
                        <th width="8%">No Antrian</th>
                        <th width="10%">ID Pasien</th>
                        <th width="10%">Nama Pasien</th>
                        <th width="10%">Poli</th>
                        <th width="10%">Keterangan</th>
                        <th width="8%">Tanggal</th>
                    </tr>
                <?php $i=1; ?>
                    <?php 
                    $data = mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and poli like '$poli' and ket like 'Antrian'");  
                    while ($d = mysqli_fetch_array($data)) { 
                        if ($d['id_pasien']==$id_pas) {
                        ?>
                        <tr style="font-size: 13px; text-align: center; background: green">
                            <td><?= $i ?></td>
                            <td><?= $d['no_antrian'] ?></td>
                            <td><?= $d['id_pasien'] ?></td>
                            <td><?= $d['nm_pasien'] ?></td>
                            <td><?= $d['poli'] ?></td>
                            <td><?= $d['ket'] ?></td>
                            <td><?= $d['tanggal'] ?></td>                     
                        </tr>
                        <?php }else{ ?>
                        <tr style="font-size: 13px; text-align: center;">
                            <td><?= $i ?></td>
                            <td><?= $d['no_antrian'] ?></td>
                            <td><?= $d['id_pasien'] ?></td>
                            <td><?= $d['nm_pasien'] ?></td>
                            <td><?= $d['poli'] ?></td>
                            <td><?= $d['ket'] ?></td>
                            <td><?= $d['tanggal'] ?></td>                     
                        </tr>
                <?php $i++; ?>
                <?php }} ?>
                </table>
            </form>
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
                <strong style="font-size: 20px">Tabel Keterangan Poli</strong>
               
                <table cellspacing="0" cellpadding="10" border="1%" bgcolor="#F0E68C" width="100%">
                    <tr>
                            <th width="3%">No</th>
                            <th width="10%">ID Poli</th>
                            <th width="17%">Nama Poli</th>
                            <th width="5%">Keterangan</th>
                    </tr>
                    <?php $i=1; ?>
                        <?php while ($a = mysqli_fetch_array($data)) { ?>
                            <tr>
                               <td align="center"><?= $i ?></td>
                                <td style="font-size: 15px; text-align: center;"><?= $a['id_poli'] ?></td>
                                <td style="font-size: 15px; text-align: center;"><?= $a['nm_poli'] ?></td>
                                <td style="font-size: 15px; text-align: center;"><?= $a['ket'] ?></td>
                            </tr>
                        <?php $i++; ?>
                        <?php } ?>
                </table>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>