<!doctype html>
<html>
<head>
<?php include("anabanner.php"); ?>
<link rel="stylesheet" type="text/css" href="tasarim.css">
<meta charset="utf-8">
<title>Adminler</title>
</head>

<body>
<p></p>
<table border="5" class="ana" align="center">
<tr><td>Aktif Admin : ANAADMIN </td></tr>
</table>
<table border="0" class="ana" align="center">
    <tr>
      <td align="center">Admin İd</td>
      <td  align="center">Admin Kullanıcı Adı</td>
    </tr>
<?php
session_start();
include("baglanti.php");
$sorgu=("SELECT * from kullanicilar");
@$musterisayisi=mysql_num_rows($sorgu);
$sorgu2 = mysql_query("SELECT * FROM adminler");
while($yaz=mysql_fetch_array($sorgu2))
{
	$adminkullaniciadi=$yaz['adminkullaniciadi'];
	$sifre=$yaz['sifre'];
	$adminid=$yaz['adminid'];
?>
    <tr>
      <td><?php echo $adminid; ?></td>
      <td><a href="anaadminmusteri2.php?adminkullaniciadi=<?php echo $adminkullaniciadi; ?>"><?php echo $adminkullaniciadi; ?></a></td>
    </tr>
<?php
}
?>
</table>
</body>
</html>
