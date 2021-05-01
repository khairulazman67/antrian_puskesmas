<!DOCTYPE html>
<html>
<head>
	<title>Tampil Antrian</title>
	<link rel="stylesheet" type="text/css" href="dashboard.css?v=1.0">
    <style type="text/css">
       
    </style>
</head>
<body bgcolor="#3CB371">
    <div class="container">
		<div class="isi">
			<table>
				<tr>
					<td width="10px"></td>
                    <td><img src="gambar/LOGO.png" style="height:50px"></td>
                    <td width="10px"></td>
                    <td width="750px"><h2>Puskesmas Muara Dua Kota Lhokseumawe</h2></td>
				</tr>
			</table>
		</div>
		 <?php
            if (isset($_POST['poli'])) {
                $namapoli = $_POST['poli'];
                setcookie('poli',$namapoli);
            }
            $conn = mysqli_connect("localhost", "root", "", "projekweb");
            if ($conn) {
                // echo "berhasil";
            } else {
                echo "error";
            }
            date_default_timezone_set('asia/jakarta');
            $tanggal =  date('d/m/Y');
                $data = mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and ket like 'Antrian'");    
                $gigi= mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and poli = 'Poli Gigi' and ket ='Antrian'");
                $polgigi = mysqli_num_rows($gigi);   
                $anak= mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and poli = 'Poli Anak' and ket ='Antrian'");
                $polanak = mysqli_num_rows($anak);   
                $umum= mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and poli = 'Poli Umum' and ket ='Antrian'");
                $polumum = mysqli_num_rows($umum);
                $vct= mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and poli = 'Poli VCT' and ket ='Antrian'");
                $polvct = mysqli_num_rows($vct);      
                $kb= mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and poli = 'Poli KB/KIA' and ket ='Antrian'");
                $polkb = mysqli_num_rows($kb);   
                $fisio= mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and poli = 'Poli Fisioterapi' and ket ='Antrian'");
                $polfisio = mysqli_num_rows($fisio);   
                $gizi= mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and poli = 'Poli Gizi' and ket ='Antrian'");
                $polgizi = mysqli_num_rows($gizi);   
                $imunisasi= mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and poli = 'Poli Imunisasi' and ket ='Antrian'");
                $polimunisasi = mysqli_num_rows($imunisasi);
                
                $panggigi = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM poli where nm_poli like 'Poli Gigi'")); 
                $panganak = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM poli where nm_poli like 'Poli Anak'")); 
                $pangumum = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM poli where nm_poli like 'Poli Umum'")); 
                $pangvct = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM poli where nm_poli like 'Poli VCT'"));
                $pangkb = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM poli where nm_poli like 'Poli KB/KIA'"));
                $pangfisio = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM poli where nm_poli like 'Poli Fisioterapi'"));  
                $panggizi = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM poli where nm_poli like 'Poli Gizi'"));
                $pangimunisasi = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM poli where nm_poli like 'Poli Imunisasi'"));
            ?>
  
        <table width="100%">
        <tr>
        <td>
            <table width="100%"  style="text-align: center ; font-weight: bold;">
                <tr>
                    <td>
                        <table width="100%" cellpadding="10" border="1" style="padding: 2px">
                            <tr>
                                <td height="35px" style="background-color: #FFDB63; font-size: 20px">Poli Gigi</td>
                            </tr>
                            <tr>
                                <td height="25px" style="background-color: #5262E4; color: white; font-size: 15px" >Jumlah Antrian : <?php echo $polgigi; ?></td>
                            </tr>
                            <tr>
                                <td height="55px" style="background-color: white; font-size: 30px"><?php echo $panggigi['panggil']; ?></td></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table width="100%" cellpadding="10" border="1" style="padding: 2px">
                            <tr>
                                <td height="35px" style="background-color: #FFDB63; font-size: 20px">Poli Anak</td>
                            </tr>
                            <tr>
                                <td height="25px" style="background-color: #5262E4; color: white; font-size: 15px" >Jumlah Antrian : <?php echo $polanak; ?></td>
                            </tr>
                            <tr>
                                <td height="55px" style="background-color: white; font-size: 30px"><?php echo $panganak['panggil']; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="10" border="1" style="padding: 2px">
                            <tr>
                                <td height="35px" style="background-color: #FFDB63; font-size: 20px">Poli Umum</td>
                            </tr>
                            <tr>
                                <td height="25px" style="background-color: #5262E4; color: white; font-size: 15px" >Jumlah Antrian : <?php echo $polumum; ?></td>
                            </tr>
                            <tr>
                                <td height="55px" style="background-color: white; font-size: 30px"><?php echo $pangumum['panggil']; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table width="100%" cellpadding="10" border="1" style="padding: 2px">
                            <tr>
                                <td height="35px" style="background-color: #FFDB63; font-size: 20px">Poli VCT</td>
                            </tr>
                            <tr>
                                <td height="25px" style="background-color: #5262E4; color: white; font-size: 15px" >Jumlah Antrian : <?php echo $polvct; ?></td>
                            </tr>
                            <tr>
                                <td height="55px" style="background-color: white; font-size: 30px"><?php echo $pangvct['panggil']; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="10" border="1" style="padding: 2px">
                            <tr>
                                <td height="35px" style="background-color: #FFDB63; font-size: 20px">Poli KB/KIA</td>
                            </tr>
                            <tr>
                                <td height="25px" style="background-color: #5262E4; color: white; font-size: 15px" >Jumlah Antrian : <?php echo $polkb; ?></td>
                            </tr>
                            <tr>
                                <td height="55px" style="background-color: white; font-size: 30px"><?php echo $pangkb['panggil']; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table width="100%" cellpadding="10" border="1" style="padding: 2px">
                            <tr>
                                <td height="35px" style="background-color: #FFDB63; font-size: 20px">Poli Fisioterapi</td>
                            </tr>
                            <tr>
                                <td height="25px" style="background-color: #5262E4; color: white; font-size: 15px" >Jumlah Antrian : <?php echo $polfisio; ?></td>
                            </tr>
                            <tr>
                                <td height="55px" style="background-color: white; font-size: 30px"><?php echo $pangfisio['panggil']; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" cellpadding="10" border="1" style="padding: 2px">
                            <tr>
                                <td height="35px" style="background-color: #FFDB63; font-size: 20px">Poli Gizi</td>
                            </tr>
                            <tr>
                                <td height="25px" style="background-color: #5262E4; color: white; font-size: 15px" >Jumlah Antrian : <?php echo $polgizi; ?></td>
                            </tr>
                            <tr>
                                <td height="55px" style="background-color: white; font-size: 30px"><?php echo $panggizi['panggil']; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table width="100%" cellpadding="10" border="1" style="padding: 2px">
                            <tr>
                                <td height="35px" style="background-color: #FFDB63; font-size: 20px">Poli Imunisasi</td>
                            </tr>
                            <tr>
                                <td height="25px" style="background-color: #5262E4; color: white; font-size: 15px" >Jumlah Antrian : <?php echo $polimunisasi; ?></td>
                            </tr>
                            <tr>
                                <td height="55px" style="background-color: white; font-size: 30px"><?php echo $pangimunisasi['panggil']; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <div class="tabel">
                <td>
                    <table border="1" width="90%" height="100%" style="margin-bottom: 500px; margin-left: 4%;" bgcolor="#F0E68C">
                        <tr>
                            <th width="3%">No</th>
                            <th width="8%">No Antrian</th>
                            <th width="8%">ID Pasien</th>
                            <th width="10%">Nama Pasien</th>
                            <th width="8%">Poli</th>
                            <th width="10%">Keterangan</th>
                            <th width="8%">Tanggal</th>
                        </tr>
                    <?php $i=1; ?>
                        <?php 
                        $data = mysqli_query($conn, "SELECT * FROM antrian where tanggal like '$tanggal' and ket like 'Antrian'");  
                        while ($d = mysqli_fetch_array($data)) { 
                            ?>
                            <tr>
                                <td align="center"><?= $i ?></td>
                                <td style="font-size: 15px; text-align: center;"><?= $d['no_antrian'] ?></td>
                                <td style="font-size: 15px; text-align: center;"><?= $d['id_pasien'] ?></td>
                                <td style="font-size: 15px; text-align: center;"><?= $d['nm_pasien'] ?></td>
                                <td style="font-size: 15px; text-align: center;"><?= $d['poli'] ?></td>
                                <td style="font-size: 15px; text-align: center;"><?= $d['ket'] ?></td>
                                <td style="font-size: 15px; text-align: center;"><?= $d['tanggal'] ?></td>                     
                            </tr>
                    <?php $i++; }?>
                    </table>
                </td>
            </div>
        </tr>
        </table>
    <script>
        setTimeout('location.href=\"tampiltv.php"',2000);
    </script>
</body>
</html>