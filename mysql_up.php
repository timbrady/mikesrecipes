<html>
<head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"><title>Test MySQL</title></head>
<body>
<!-- mysql_up.php -->
<?php
$host="mysql";
$user="tim";
$password="tim";

mysql_connect($host,$user,$password);
$sql="show status";
$result = mysql_query($sql);
if ($result == 0)
{
   echo "<b>Error " . mysql_errno() . ": " 
         . mysql_error() . "</b>";
}
else
{
?>
<!-- Table that displays the results -->
<table border=”1”>
  <tr><td><b>Variable_name</b></td><td><b>Value</b>
      </td></tr>
  <?php
    for ($i = 0; $i < mysql_num_rows($result); $i++) {
      echo "<TR>";
      $row_array = mysql_fetch_row($result);
      for ($j = 0; $j < mysql_num_fields($result); $j++) 
      {
        echo "<TD>" . $row_array[$j] . "</td>";
      }
      echo "</tr>";
    }
  ?>
</table>
<?php } ?>
</body></html>

