<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="tasarim.css">
<?php include("banner.php"); ?>
<style>
#serbest{
	position: absolute;
	align: center;
}
</style>
<meta charset="utf-8">
<title>musteri olustur</title>
<?php 
session_start();
$adminadi=$_SESSION['adminadi'];
?>
<table border="5" class="ana" align="center">
<tr><td>Aktif Admin : </td><td> <?php echo $adminadi; ?> </td></tr>
</table>
<p></p>
</head>
<body>
<table border="0" align="center" class="ana">
<tr><td colspan="2" align="center"> MÜŞTERİ OLUŞTUR </td></tr>
<tr><td>
<form action="musteriolustur.php" method="post">
Kullanici id:</td><td><select name="id" class="textbox">
<?php
include("baglanti.php");
$getir=mysql_query("SELECT * FROM yenikullanicilar");
while($dongu=mysql_fetch_array($getir))
{
?>
<option> <?php echo $dongu['id']; ?> </option>
<?php } ?>
</select> </td></tr>
<tr><td>Kullanici adi:</td><td><input type="text" name="kullaniciadi" class="textbox"> </td></tr>
<tr><td>Bakiye:</td><td><input type="text" name="bakiye" class="textbox"> </td></tr>
<tr><td>Şifre:</td><td><input type="text" name="sifre" class="textbox"></td></tr>
<tr><td>&nbsp;</td><td align="right"><input type="submit" value="KAYIT" class="textbox"></td></tr>
</form>
</table>
<?php
@$kullaniciadi=$_POST['kullaniciadi'];
@$bakiye=$_POST['bakiye'];
@$sifre=$_POST['sifre'];
@$id=$_POST['id'];
$tarih=date('y/m/d H:i');
$ekle=mysql_query("INSERT INTO kullanicilar (id, kullaniciadi, bakiye, adminadi, sifre, tarih) values ('$id', '$kullaniciadi', '$bakiye', '$adminadi', '$sifre', '$tarih')");
$sil=mysql_query("DELETE FROM yenikullanicilar WHERE id='$id'");
?>
</body>
</html>