<?php
setcookie('uid','',time()-86400,'/');
header('Location:login.php');
?>