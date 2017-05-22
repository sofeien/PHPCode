<?php
ob_start();
function check_auth($email,$password) {
    $mysqli = new mysqli('localhost', 'root', 'root', 'cc');
    if($mysqli->connect_errno) {
        echo '连接数据库失败！';
        exit();
    }
    $query = "SELECT * FROM users WHERE email=\"$email\" AND passwd=sha1(\"$password\")";
    $result = $mysqli->query($query);
    $mysqli->close();
    if($result->num_rows ==1) {
        return $email;
    } else {
        return 0;
    }
}

?>
<html>
<head><title>Login</title></head>
<body>
<?php 
if(isset($_POST['login']) && ($_POST['login']=='Log in')) {
    if($uid = check_auth($_POST['email'], $_POST['password'])) {
        setcookie('uid',$uid,time()+14400,'/');
        header('Location:index.php');
        exit();
    } else {
        echo '<script>alert("帐号密码错误!");history.back();</script>';
    }
} else {
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