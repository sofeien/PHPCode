<?php
    class MyClass {
        public $name = 'Jone';
        public $sex = 'male';
    }
    
    $obj = new MyClass();
    foreach($obj as $key=>$val) {
        echo "$key=>$val<br>"; 
    }
?>