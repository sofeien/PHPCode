<?php
if(isset($_COOKIE['uid']) && $_COOKIE['uid']) {
?>
<html>
    <head><title>Index Page</title></head>
    <body>
        <h1>Login with UID:<?php  echo $_COOKIE['uid']; ?></h1>
        <a href="logout.php">Log Out</a>
    </body>
</html>
<?php     
} else {
    header('Location:login.php');
}
?>