<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>

<body>
<?php
$tarih=date('y/m/d H:i');
include("baglanti.php");
$kadi=$_GET['kullaniciadi'];
$islemid=$_GET['islemid'];
$sorgu=mysql_query("SELECT * FROM islemler WHERE islemid='$islemid'");
while($dongu=mysql_fetch_array($sorgu))
{
	$kullaniciadi=$dongu['kullaniciadi'];
	$adminadi=$dongu['adminadi'];
	$islem=$dongu['islem'];
	$durum=$dongu['durum'];
}
$sorgu3=mysql_query("SELECT * FROM kullanicilar WHERE kullaniciadi='$kullaniciadi'");
while($dongu2=mysql_fetch_array($sorgu3))
{
	$bakiye=$dongu2['bakiye'];
}
if($durum=="yuklendi")
{
	$yenibakiye=$bakiye+$islem;
	$sorgu2=mysql_query("INSERT INTO islemonay (kullaniciadi, adminadi, islem, tarih, durum) VALUES ('$kullaniciadi', '$adminadi', '$islem', '$tarih', 'yuklendi')");
}
else
{
	$yenibakiye=$bakiye-$islem;
	$sorgu2=mysql_query("INSERT INTO islemonay (kullaniciadi, adminadi, islem, tarih, durum) VALUES ('$kullaniciadi', '$adminadi', '$islem', '$tarih', 'cekildi')");
}
$guncelle = mysql_query("UPDATE kullanicilar SET bakiye='$yenibakiye' WHERE kullaniciadi='$kullaniciadi'");
$sil=mysql_query("DELETE FROM islemler WHERE islemid='$islemid'");
header("refresh:0.1;url=istek.php");
?>
</body>
</html>