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
      <td >İD</td>
      <td >Kullanıcı Adı</td>
      <td> Admin Adi </td>
      <td >Bakiye</td>
      <td >Tarih</td>
    </tr>
<?php
session_start();
include("baglanti.php");
$sorgu=("SELECT * from kullanicilar");
@$musterisayisi=mysql_num_rows($sorgu);
$sorgu2 = mysql_query("SELECT * FROM kullanicilar");
while($yaz=mysql_fetch_array($sorgu2))
{
	$kullaniciadi=$yaz['kullaniciadi'];
	$adminadi=$yaz['adminadi'];
	$id=$yaz['id'];
	$bakiye=$yaz['bakiye'];
	$tarih=$yaz['tarih'];
?>
    <tr>
      <td><?php echo $id; ?></td>
      <td><a href="anaadminmusteri.php?adminkullaniciadi=<?php echo $kullaniciadi; ?>"><?php echo $kullaniciadi; ?></a></td>
      <td><?php echo $adminadi; ?></td>
      <td><?php echo $bakiye; ?></td>
      <td><?php echo $tarih; ?></td>
    </tr>
<?php
}
?>
</table>
</body>
</html>
