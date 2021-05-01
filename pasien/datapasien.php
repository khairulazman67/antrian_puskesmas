<!DOCTYPE html>
<html>
<head>
    <title>Data Pasien</title>
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
            <p style="text-align: center; font-size: 50px; margin-left: 15%;">DATA PASIEN</p>
        </div>

        <div style="margin-left: 20%">
        <BR>
        <?php
        
            $conn = mysqli_connect("localhost", "root", "", "projekweb");
            if ($conn) {
                // echo "berhasil";
            } else {
                echo "error";
            }
            $aata = mysqli_query($conn, "SELECT * FROM data_pas where id_pas='$id_pas'");
            $a = mysqli_fetch_array($aata);
        ?>    
            <table>
                <form action="<?=isset($_POST['id']) ? 'edit.php' : "edit.php"?>" method="POST">
                    <tr>
                        <td>
                        <label>NIK</label>
                        </td>
                        <td>
                            <input type="text" name="NIK" class="formlogin" value="<?= isset($a['NIK']) ? $a['NIK'] : '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nama Lengkap</label>
                        </td>
                        <td>
                            <input type="text" name="nama" class="formlogin" value="<?= isset($a['nama']) ? $a['nama'] : '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tempat Lahir</label>
                        </td>
                        <td>
                            <input type="text" name="tempatlahir" class="formlogin" value="<?= isset($a['tmp_lahir']) ? $a['tmp_lahir'] : '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tanggal Lahir</label>
                        </td>
                        <td>
                            <input type="date" name="tanggallahir" class="formlogin" value="<?= isset($a['tgl_lahir']) ? $a['tgl_lahir'] : '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Jenis Kelamin</label>
                        </td>
                        <td>
                            <select name="jeniskelamin" class="formlogin">
                                <option value="<?= isset($a['j_kel']) ? $a['j_kel'] : '' ?>"><?= isset($a['j_kel']) ? $a['j_kel'] : '-Pilihan-' ?></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Alamat</label>
                        </td>
                        <td>
                            <input type="textarea" name="alamat" class="formlogin" value="<?= isset($a['alamat']) ? $a['alamat'] : '' ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Jaminan Kesehatan</label>
                        </td>
                        <td>
                            <select name="jaminankesehatan" class="formlogin" id="">
                                <option value="<?= isset($a['jaskes']) ? $a['jaskes'] : '' ?>"><?= isset($a['jaskes']) ? $a['jaskes'] : '-Pilihan-' ?></option>
                                <option value="BPJS">BPJS</option>
                                <option value="JKN">JKN</option>
                                <option value="JAMKESMAS">JAMKESMAS</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>No Kartu Jaminan Kesehatan</label>
                        </td>
                        <td>
                            <input type="text" name="nokartu" class="formlogin" value="<?= isset($a['no_jaskes']) ? $a['no_jaskes'] : '' ?>">   
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>No Hp</label>
                        </td>
                        <td>
                            <input type="text" name="nohp" class="formlogin" value="<?= isset($a['no_hp']) ? $a['no_hp'] : '' ?>">  
                            <input type="hidden" name="id" value="<?= $id_pas?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><BR>
                            <input type="submit" value="Simpan" name="Daftar" class="tombol">
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>