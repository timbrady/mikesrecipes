<?php
 /* File: login_form.inc */

echo "<html><head><title>Members Only Login</title></head><body><center><img src=/images/welcome.jpg><br><br><font size='+1'><b>Please Log In</b></font>
<p><form action='login.php?do=login' method='POST'> <table border='0'>";
 
if (isset($message))
             echo "<tr><td colspan='2'>$message </td></tr>";

echo "<tr><td align=right><b>Username</b></td>
             <td><input type='text' name='fusername' size='20' maxsize='20'>
             </td></tr><tr><td width='120' align='right'><b>Password</b>
             </td><td><input type='password' name='fpassword' size='20' maxsize='20'></td></tr>
           <tr><td align='center' colspan='2'><br><input type='submit' name='log' value='Enter'></td></tr></table></form></center>
<div align='center'><font size='-1'>If you'd like to open an account, please email <a href='mailto:tim.brady@yahoo.com'>
    tim.brady@yahoo.com</A> </font></div></body></html>";

?>

