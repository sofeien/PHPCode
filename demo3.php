<meta charset="utf-8">
<?php
    class Person {
        function __construct($name) {
            $this->name = $name;
        }
        private $name;
        function __toString() {
            return 'My name is '.$this->name.'.<br>';
        }
    }
    $zhangsan = new Person('张三');
    echo $zhangsan;
?>