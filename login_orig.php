<html>
<head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8"><title>Welcome to Mike's Recipes</title></head>
<body>
<?php
/* Program: Login.php
 * Desc:    Login program for the Members Only section of the
 *          pet store. It provides two options: (1) login
 *          using an existing Login Name and (2) enter a new
 *          login name. Login Names and passwords are stored
 *          in a MySQL database. 
 */
  session_start();                                        
  include("dogs.inc");                                    
  switch (@$_GET['do'])                                   
  {
    case "login":                                        
     $connection = mysql_connect($host,$user,$password)
               or die ("Couldn't connect to server.");
      $db = mysql_select_db($database, $connection)
               or die ("Couldn't select database.");  

      $sql = "SELECT loginName FROM Member 
              WHERE loginName='$_POST[fusername]'"; 
      $result = mysql_query($sql)
                  or die("Couldn't execute query."); 
      $num = mysql_num_rows($result);             
  
      if ($num == 1)  // login name was found        
      {
         $sql = "SELECT loginName FROM Member 
                 WHERE loginName='$_POST[fusername]'
                 AND password='$_POST[fpassword]'";
         $result2 = mysql_query($sql)
                   or die("Couldn't execute query 2.");
         $num2 = mysql_num_rows($result2);
         if ($num2 > 0)  // password is correct           
         {
           $_SESSION['auth']="yes";                       
           $logname=$_POST['fusername']; 
           $_SESSION['logname'] = $logname;              
           $today = date("Y-m-d h:m:s"); 
           $sql = "INSERT INTO Login (loginName,loginTime)
                   VALUES ('$logname','$today')";
           mysql_query($sql) or die("Can't execute TTT query.");
           header("Location: index.php");
         }
         else    // password is not correct               
         {
           unset($_GET['do']);                                    
           $message="The Login Name, '$_POST[fusername]' 
                     exists, but '$_POST[fpassword]' is not the
                     correct password! Please try again.<br>";
           include("login_form.inc");                     
         } 
      }                                                  
      elseif ($num == 0)  // login name not found        
      {   
         unset($_GET['do']);                                      
         $message = "The Login Name you entered does not 
                     exist! Please try again.<br>";
         include("login_form.inc");
      }
    break;                                               

    default:                                           
    include("login_form.inc");
  }
?>

</html>

