<?php
    class HelloWorld {
        function display ($count) {
            for ($i=0;$i<$count;$i++) {
                echo 'Hello,World.<br>';
            }
            return $count;
        }
    }
    
    class HelloWorldDelegator {
        private $obj;
        function __construct() {
            $this->obj = new HelloWorld();
        }
        function __call($method,$argument) {
            return call_user_func_array(array($this->obj,$method), $argument);
        }
    }
    
    $h = new HelloWorldDelegator();
    echo $h->display(4);
?>