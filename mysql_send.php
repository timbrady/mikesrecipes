<!-- Program:  mysql_send.php
     Desc:     PHP program that sends an SQL query to the 
               MySQL server and displays the results.
-->
<html>
<head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"><title>SQL Query Sender</title></head>
<body>
<?php
$host="mysql";
$user="tim";
$password="tim";

/* Section that executes query */
if(@$_GET['form'] == "yes")
{
  mysql_connect($host,$user,$password);
  mysql_select_db($_POST['database']);
  $query = stripSlashes($_POST['query']);
  $result = mysql_query($query);
  echo "Database Selected: <b>{$_POST['database']}</b><br>
        Query: <b>$query</b><h3>Results</h3><hr>";
  if($result == 0)
  {
     echo "<b>Error ".mysql_errno().": ".mysql_error().
          "</b>";
  }
  elseif (@mysql_num_rows($result) == 0)
  {
     echo("<b>Query completed. No results returned.
           </b><br>");
  }
  else
  {
   echo "<table border='1'>
          <thead>
           <tr>";
            for($i = 0;$i < mysql_num_fields($result);$i++)
            {
             echo "<th>".mysql_field_name($result,$i).
                  "</th>";
            }
   echo "  </tr>
          </thead>
         <tbody>";
          for ($i = 0; $i < mysql_num_rows($result); $i++)
          {
            echo "<tr>";
             $row = mysql_fetch_row($result);
             for($j = 0;$j<mysql_num_fields($result);$j++) 
             {
               echo("<td>" . $row[$j] . "</td>");
             }
            echo "</tr>";
          }
   echo "</tbody>
        </table>";
  }  //end else
  echo "
   <hr><br>
   <form action=\"{$_SERVER['PHP_SELF']}\" method=\"POST\">
     <input type='hidden' name='query' value='$query'>
     <input type='hidden' name='database' 
            value={$_POST['database']}>
     <input type='submit' name=\"queryButton\" 
            value=\"New Query\">
     <input type='submit' name=\"queryButton\" 
            value=\"Edit Query\">
   </form>";
  unset($form);
  exit();
}  // endif form=yes

/* Section that requests user input of query */
@$query=stripSlashes($_POST['query']);
if (@$_POST['queryButton'] != "Edit Query")
{
  $query = " ";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?form=yes" 
      method="POST">
 <table>
  <tr>
   <td align=right><b>Type in database name</b></td>
   <td><input type="text" name="database" 
              value=<?php echo @$_POST['database'] ?> ></td>
  </tr>
  <tr>
   <td align="right" valign="top">
         <b>Type in SQL query</b></td>
   <td><textarea name="query" cols="60" 
                 rows="10"><?php echo $query ?></textarea>
   </td>
  </tr>
  <tr>
   <td colspan="2" align="center"><input type="submit" 
       value="Submit Query"></td>
  </tr>
 </table>
</form>
</body></html>




