<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="tasarim.css">
<?php include("banner.php"); ?>
<meta charset="utf-8">
<title>islemler</title>
<?php 
session_start();
$adminadi=$_SESSION['adminadi'];
?>
<table border="5" class="ana" align="center">
<tr><td>Aktif Admin : </td><td> <?php echo $adminadi; ?> </td></tr>
</table>

</head>

<body>
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
$sorgu=mysql_query("SELECT * FROM islemler WHERE adminadi='$adminadi' ORDER BY islemid DESC");
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