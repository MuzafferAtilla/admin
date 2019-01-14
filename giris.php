<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>giris</title>
<link rel="stylesheet" type="text/css" href="tasarim.css">
</head>

<body>
<table class="ana" border="0" align="center">
<form name="form1" method="post" action="giris.php" >
<tr><td>Admin Adi:</td><td><input name="kullaniciadi" type="text" id="textfield" ></td></tr>
<tr><td>Şifre:</td><td><input name="sifre" type="password"  id="textfield" ></td></tr>
<tr><td>&nbsp;</td><td align="right"><input name="button" type="submit"  id="button" value="Giriş"></td></tr>
</form>
</table>
<?php
session_start();
include("baglanti.php");
@$kullaniciadi=$_POST['kullaniciadi'];
@$sifre=$_POST['sifre'];
$sorgu2 = mysql_query("SELECT * FROM adminler");
while($yaz=mysql_fetch_array($sorgu2))
{
	@$adminkullaniciadi=$yaz['adminkullaniciadi'];
	@$adminsifre=$yaz['sifre'];
	if($kullaniciadi==$adminkullaniciadi || $sifre==$adminsifre)
	{
		$_SESSION['adminadi'] = $kullaniciadi;
		header("refresh:0.1;url=admin.php");
		break;
	}
		elseif($kullaniciadi=="admin" || $sifre=="admin1q2w3e4r")
	{
		$_SESSION['admin'] = "admin";
		header("refresh:0.1;url=anaadmin.php");
		break;
	}
}
?>
</body>
</html>
