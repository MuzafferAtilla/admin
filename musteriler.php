<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="tasarim.css">
<?php include("banner.php"); ?>
<meta charset="utf-8">
<title>musteriler</title>
<?php 
session_start();
$adminadi=$_SESSION['adminadi'];
?>
<table border="5" class="ana" align="center">
<tr><td>Aktif Admin : </td><td> <?php echo $adminadi; ?> </td></tr>
</table>
</head>

<body>
<table  border="0" align="center" class="ana">
    <tr align="center">
      <td >İd</td>
      <td >Kullanıcı Adı</td>
      <td >Bakiye</td>
      <td >Tarih</td>
    </tr>
<?php
include("baglanti.php");
@mysql_select_db('deneme',$baglanti);
$sorgu=("SELECT * from kullanicilar WHERE adminadi='muzo' ORDER BY islemid DESC");
@$musterisayisi=mysql_num_rows($sorgu);
$sorgu2 = mysql_query("SELECT * FROM kullanicilar WHERE adminadi='$adminadi'");
while($yaz=mysql_fetch_array($sorgu2))
{
	$kullaniciadi=$yaz['kullaniciadi'];
	$id=$yaz['id'];
	$bakiye=$yaz['bakiye'];
	$tarih=$yaz['tarih'];
?>
    <tr>
      <td><?php echo $id; ?></td>
      <td><a href="musteri.php?kullaniciadi=<?php echo $kullaniciadi; ?>"><?php echo $kullaniciadi; ?></a></td>
      <td><?php echo $bakiye; ?></td>
      <td><?php echo $tarih; ?></td>
    </tr>
<?php
}
?>
</table>
</body>
</html>
