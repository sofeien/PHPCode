<?php
    interface Loggable{
        function logString();
    }
    
    class Person implements Loggable{
        static $idmaker=0;
        private $name,$address,$idNumber,$age;
        function __construct($name){
            self::$idmaker++;
            $this->idNumber = self::$idmaker;
            $this->name = $name;
        }
        function logString(){
            return "class Person: name=$this->name,ID=$this->idNumber\n";
        }
    }
    
    function MyLog($obj){
        if($obj instanceof Loggable){
            echo $obj->logString();
        } else {
            echo "not support\n";
        }
    }
    
    $zhangsan = new Person('zhangsan');
    MyLog($zhangsan);
    echo '<br>';
    $lisi = new Person('lisi');
    MyLog($lisi);
?>