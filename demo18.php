<?php
    class Auth {
        private $mysqli;
        function __construct() {
            $this->mysqli = new mysqli('localhost', 'root', 'root', 'cc');
            if($this->mysqli->connect_errno) {
                printf("Connect faild:%s\n",$this->mysqli->connect_error);
                exit();
            }
        }
        //加密存储用户密码
        public function addUser($email,$password) {
            $this->mysqli->query('insert into users(email,passwd) values ("' . $email . '","' . sha1($password) . '")');
        }
        //校验用户密码
        public function authUser($email,$password) {
            $q = 'select * from users where email="' . $email .'" and passwd="' . sha1($password) . '"';
            $result = $this->mysqli->query($q);
            if($result->num_rows == 1) {
                return true;
            } else {
                return false;
            }
            $result->close();
        }
        function __destruct() {
            $this->mysqli->close();
            echo '关闭数据库连接';
        }
    }
    
    $auth = new Auth();
    $email = '444023993@qq.com';
    $password = 'cc12545';
    $auth->addUser($email, $password);
    var_dump($auth->authUser('444023991@qq.com', 'cc123456'));
?>