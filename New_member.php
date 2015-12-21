
<?php
 /* Program: New_member.php
  * Desc:    Displays the new member welcome page. Greets
             member by name and gives user choice to enter
  *          restricted section or go back to main page.
  */
  session_start();                                        # 7
  
  if (@$_SESSION['auth'] != "yes")                        # 9
  {
     header("Location: login.php");
     exit();
  }
  include("dogs.inc");                                    #14
  $connection = mysql_connect($host,$user,$password)
               or die ("Couldn't connect to server.");    #16
  $db = mysql_select_db($database, $connection)
               or die ("Couldn't select database.");      #18
  $sql = "SELECT firstName,lastName FROM Member 
                 WHERE loginName='{$_SESSION['logname']}'";
  $result = mysql_query($sql)
               or die("Couldn't execute query 1.");
  $row = mysql_fetch_array($result,MYSQL_ASSOC);
  extract($row);
  echo "<html>
        <head><title>New Member Welcome</title></head>
        <body>
        <h2 align='center' style='margin-top: .7in'>
        Welcome $firstName $lastName</h2>\n";            #29
?>                                                        
<p>Your new Member Account lets you enter the Members Only 
section of our web site. You'll find special discounts and
bargains, a huge database of animal facts and stories, advice
from experts, advance notification of new pets for sale,
a message board where you can talk to other Members, and much
more.
<p>Your new Member ID and password were emailed to you. Store
   them carefully for future use.<br>
<div align="center">
<p style="margin-top: .5in"><b>Glad you could join us!</b>
<form action="member_page.php" method="POST">
   <input type="submit" 
          value="Enter the Members Only Section">
</form>
<form action="PetShopFrontMember.php" method="POST">
   <input type="submit" value="Go to Pet Store Main Page">
</form>
</div>
</body></html>

