<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="tasarim.css">
<?php include("banner.php"); ?>
<meta charset="utf-8">
<title>yukle & cek</title>
<?php 
session_start();
$adminadi=$_SESSION['adminadi'];
?>
<table border="5" class="ana" align="center">
<tr><td>Aktif Admin : </td><td> <?php echo $adminadi; ?> </td></tr>
</table>
<p></p>
<table border="0" class="ana" align="center">
<form action="yuklecek.php" method="post">
<tr><td colspan="2" align="center"> YÜKLEME İŞLEMLER </td></tr>
<tr><td align="right">Kullanıcı Adı:</td><td><input type="text" name="kullaniciadi" class="textbox"></td></tr>
<tr><td align="right">Yüklenicek Para:</td><td><input type="text" name="yukle" class="textbox"> </td></tr>
<tr><td><tr><td>&nbsp;</td><td align="right"><input type="submit" value="Yükle" class="textbox"></td></tr>
</form>
<form action="yuklecek.php" method="post">
<tr><td colspan="2" align="center"> ÇEKME İŞLEMLER </td></tr>
<tr><td align="right">Kullanıcı Adı:</td><td><input type="text" name="kullaniciadi" class="textbox"> </td></tr>
<tr><td align="right">Çekilecek Para:</td><td><input type="text" name="cek" class="textbox"> </td></tr>
<tr><td><tr><td>&nbsp;</td><td align="right"><input type="submit" value="Çek" class="textbox"></td></tr>
</form>
</table>
<?php 
include("baglanti.php");
@$kullaniciadi=$_POST['kullaniciadi'];
@$yukle=$_POST['yukle'];
@$cek=$_POST['cek'];
$tarih=date('y/m/d H:i');
@$getir = mysql_query("SELECT * FROM kullanicilar WHERE kullaniciadi='$kullaniciadi'");
while(@$dongu=mysql_fetch_array($getir))
	{
		$yenibakiye = $dongu['bakiye'];
	}
if(isset($yukle))
{
	@$yenibakiye = $yenibakiye+$yukle;
	$islemyukle = mysql_query("INSERT INTO islemler (adminadi, kullaniciadi, islem, tarih, durum) VALUES ('$adminadi', '$kullaniciadi', '$yukle', '$tarih', 'yuklendi - bekleme')");
	echo "<table border=0 align=center class='yesil'><tr><td>YÜKLEME İŞLEMİ BAŞARILI</td></tr></table>";
}

if(isset($cek))
{
	@$yenibakiye = $yenibakiye-$cek;
	$islemcek = mysql_query("INSERT INTO islemler (adminadi, kullaniciadi, islem, tarih, durum) VALUES ('$adminadi', '$kullaniciadi', '$cek', '$tarih', 'cekildi - bekleme')");
echo "<table border=0 align=center class='yesil'><tr><td>ÇEKME İŞLEMİ BAŞARILI</td></tr></table>";
}
?>
</body>
</html>