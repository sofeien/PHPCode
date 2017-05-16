<?php
    //工厂模式
    abstract  class User {
        private  $name;
        function __construct($name) {
            $this->name = $name;    
        }
        function getName() {
            return $this->name;
        }
        function hasReadPermission() {
            return true;
        }
        function hasModifyPermission() {
            return false;
        }
        function hasDeletePermission() {
            return false;
        }
    }
    
    class Guest extends User {
        
    }
    class Common extends User {
        function hasModifyPermission() {
            return true;
        }
    }
    class Admin extends User {
        function hasModifyPermission() {
            return true;
        }
        function hasDeletePermission() {
            return true;
        }
    }
    
    class UserFactory {
        static private $accounts = array('Jim'=>'Guest','Lily'=>'Common','Poly'=>'Admin');
        static  function CreateUser($name) {
            if(isset(self::$accounts[$name])) {
                switch (self::$accounts[$name]) {
                    case 'Guest': return new Guest($name);
                    case 'Common': return new Common($name);
                    case 'Admin': return new Admin($name);
                    default: echo '权限组错误！';
                }
            } else {
                echo '用户名不存在';
            }
        }
        private function __construct() {
            
        }
        private function __clone() {
            
        }
    }
   function boolToStr($b) {
       if(true===$b) {
           return 'Yes';
       } else {
           return 'No';
       }
   }
    
    function showPermission($obj) {
        if($obj instanceof User) {
            echo $obj->getName() . '的权限为:<br>';
            echo 'Read: ' . boolToStr($obj->hasReadPermission()) . '<br>';
            echo 'Modify: ' . boolToStr($obj->hasModifyPermission()) . '<br>';
            echo 'Delete: ' . boolToStr($obj->hasDeletePermission()) . '<br>';
        } else {
            echo '非用户对象！';
        }
    }
    
    $accounts = array('Jim','Lily','Poly');
    foreach ($accounts as $name) {
        $user = UserFactory::CreateUser($name);
        showPermission($user);
    }
?>