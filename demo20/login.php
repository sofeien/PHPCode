<?php
    include 'session.inc';
    
    function check_auth($email,$password) {
        return 4;
    }
?>

<html>
    <head><title>Login</title></head>
    <body>
        <?php 
            if(isset($_POST['login']) && ($_POST['login']=='Log in')
                && ($uid = check_auth($_POST['email'],$_POST['password']))) {
                    $_SESSION['uid'] = $uid;
                    header('Location:index.php');
                }   else {
        ?>
<h1>Log-in</h1>
<form method="post" action="login.php">
<table>
<tr>
<td>E-mail:</td>
<td><input type="email" name="email"  /></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password"  name="password" /></td>
</tr>
<tr>
<td colspan="2">
<input type="submit"  name="login"  value="Log in" />
</td>
</tr>
</table>
</form>
        <?php 
            }
        ?>
    </body>
</html>