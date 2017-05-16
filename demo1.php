<?php
    class MyUniqueIdClass{
        static $idCounter = 0;
        public $uniqueId;
        function __construct(){
            self::$idCounter++;
            $this->uniqueId=  self::$idCounter;
        }
    }
    
    $obj1  = new MyUniqueIdClass();
    echo $obj1->uniqueId;
    echo '<br>';
    $obj2 = new MyUniqueIdClass();
    echo $obj2->uniqueId;
?>