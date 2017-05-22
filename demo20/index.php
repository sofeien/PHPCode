<?php
include 'session.inc';
    function check_login() {
        //print_r($_SESSION);
        
        if(!isset($_SESSION['uid']) || !$_SESSION['uid']) {
            header('Location:login.php');
        } else {
            echo '登录成功';
        }
    }
check_login();
?>