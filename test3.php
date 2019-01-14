<table width="100%" border="0" cellspacing="1" cellpadding="0">
 <?php
for ($i=0; $i<250; $i++){
    if ($i % 2 == 0) $renk = "#A3FFA5"; elseif ($i % 3 == 0) $renk = "blue"; else $renk="yellow";
    echo"<tr bgcolor='$renk'>";
  ?>
  <td> amk </td>
  <?php
  echo"</tr>";
}
?>
</table>