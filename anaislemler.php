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
<tr>
<td> Kullanici Adi </td>
<td> Admin Adi </td>
<td> İslem </td>
<td> Durum </td>
<td> Tarih </td>
</tr>
<?php
include("baglanti.php");
session_start();
$adminadi=$_SESSION['adminadi'];
$sorgu=mysql_query("SELECT * FROM islemler ORDER BY islemid DESC");
while($dongu=mysql_fetch_array($sorgu))
{
if($dongu['durum']=="yuklendi - onay" ||$dongu['durum']== "cekildi - onay")
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