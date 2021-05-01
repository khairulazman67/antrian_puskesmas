<!DOCTYPE html>
<html>
<head>
    <title>PETUGAS</title>
    <link rel="stylesheet" type="text/css" href="../dashboard.css?v=1.0">
</head>
<body>
    <?php
        session_start();
        if(empty($_SESSION["id_pet"])){
            echo "<script>location = '../index.php' </script>";
        }
        else{
            $id_pet = $_SESSION["id_pet"];
    ?>
    <div>
        <div class="sidebar">
            <ul style="margin-top: 170%;">
                <li><a href="dasinti.php">KEMBALI</a></li>
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
        <div>
                <div class="dashboard">
                <p style="color: black; text-align: center; font-size: 50px; margin-left: 15%;">DATA PETUGAS</p>
        </div>



        <div style="margin-left: 16%; margin-right: 1%;">
            <br> <br>
            <a href="a_daftarpetugas.php" class="tombol">Tambah Data</a>
            <br> <br> <br>
        
            <?php
                if (isset($_POST['cari'])) {
                    $cari   = $_POST['cari'];
                    $conn = mysqli_connect("localhost","root","");
                    mysqli_select_db($conn, "projekweb");
                    $hasil = mysqli_query($conn,"select * from data_pet where nama like '%$cari%'"); 
                    $jumlah = mysqli_num_rows($hasil);
                    echo "<br>";
                    echo "Ditemukan: $jumlah";
                    echo "<br>"."<br>";
                    while ($baris=mysqli_fetch_array($hasil))
                    {
            ?>
                        <table>
                            <tr> 
                                <td> ID Petugas</td>
                                <td> : <?php echo $baris[0]. "<br>";?></td>
                            </tr>
                            <tr> 
                                <td>Nama</td>
                                <td> : <?php echo $baris[1]. "<br>";?></td>
                            </tr>
                            <tr> 
                                <td> Tempat Lahir </td>
                                <td> : <?php echo $baris[2]. "<br>";?></td>
                            </tr>
                            <tr> 
                                <td> Tanggal Lahir </td>
                                <td> : <?php echo $baris[3]. "<br>";?></td>
                            </tr>
                            <tr> 
                                <td> Jenis Kelamin </td>
                                <td> : <?php echo $baris[4]. "<br>";?></td>
                            </tr>
                            <tr> 
                                <td> Alamat </td>
                                <td> : <?php echo $baris[5]. "<br>";?></td>
                            </tr>
                            <tr> 
                                <td> No HP </td>
                                <td> : <?php echo $baris[6]. "<br>";?></td>
                            </tr>
                            <tr> 
                                <td>Jabatan </td>
                                <td> : <?php echo $baris[7]. "<br>";?></td>
                            </tr>
                            <tr> 
                                <td> Tanggal Input </td>
                                <td> : <?php echo $baris[8]. "<br>";?></td>
                            </tr>
                            <tr> 
                                <td> ID Penginput </td>
                                <td> : <?php echo $baris[9]. "<br>";?></td>
                            </tr>
                            <br>    
                        </table>
            <?php
                    }
                }
            ?>
        </div>
    <?php
        }
    ?>
</body>
</html>
