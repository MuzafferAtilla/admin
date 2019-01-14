<!doctype html>
<html>
<head>
<?php include("anabanner.php"); ?>
<link rel="stylesheet" type="text/css" href="tasarim.css">
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>

<body>
<p></p>
<table border="5" class="ana" align="center">
<tr><td>Aktif Admin : ANAADMIN </td></tr>
</table>
<table border="0" class="ana" align="center">
<tr align="center">
<td> Kullanıcı Adı </td>
<td> Admin Adı </td>
<td> İşlem </td>
<td> Durum </td>
<td> Tarih </td>
</tr>
<?php
include("baglanti.php");
$gelenadminkullaniciadi=$_GET['adminkullaniciadi'];
$sorgu=mysql_query("SELECT * FROM islemler WHERE kullaniciadi='$gelenadminkullaniciadi' ORDER BY islemid DESC");
while($dongu=mysql_fetch_array($sorgu))
{
	if($dongu['durum']=="yuklendi - onay" ||$dongu['durum']=="cekildi - onay")
	{
		$renk="#A3FFA5";
	}
	elseif($dongu['durum']=="yuklendi - red" ||$dongu['durum']=="cekildi - red")
	{
		$renk="#FFA0A2";
	}
	else
	{
		$renk="#F5FF59";
	}
	echo "<tr bgcolor='$renk'>";
?>
<td> <?php echo $dongu['kullaniciadi']; ?> </td>
<td> <?php echo $dongu['adminadi']; ?> </td>
<td> <?php echo $dongu['islem']; ?> </td>
<td> <?php echo $dongu['durum']; ?> </td>
<td> <?php echo $dongu['tarih']; ?> </td>
<?php
echo "</tr>";
}
?>
</table>
</body>
</html>