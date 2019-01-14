<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="tasarim.css">
<?php include("banner.php"); ?>
<?php 
session_start();
$adminadi=$_SESSION['adminadi'];
?>
<table border="5" class="ana" align="center">
<tr><td>Aktif Admin : </td><td> <?php echo $adminadi; ?> </td></tr>
</table>
<p></p>
<?php
echo "<table border=0 align=center class='yesil'><tr><td>GİRİŞ İŞLEMİ BAŞARILI HOŞGELDİN $adminadi</td></tr></table>";
?>
</body>
</html>
