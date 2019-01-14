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
if($durum=="yuklendi - bekleme")
{
	$durum="yuklendi - red";
	$sorgu2=mysql_query("UPDATE islemler SET tarih='$tarih' WHERE islemid='$islemid'");
	$sorgu22=mysql_query("UPDATE islemler SET durum='$durum' WHERE islemid='$islemid'");
}
else
{
	$durum="cekildi - red";
	$sorgu2=mysql_query("UPDATE islemler SET tarih='$tarih' WHERE islemid='$islemid'");
	$sorgu22=mysql_query("UPDATE islemler SET durum='$durum' WHERE islemid='$islemid'");
}
//$sil=mysql_query("DELETE FROM islemler WHERE islemid='$islemid'");
header("refresh:0.1;url=istek.php");
?>
</body>
</html>